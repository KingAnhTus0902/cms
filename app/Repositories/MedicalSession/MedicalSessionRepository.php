<?php

namespace App\Repositories\MedicalSession;

use App\Constants\CadresConstants;
use App\Constants\CityConstants;
use App\Constants\CommonConstants;
use App\Constants\FolksConstants;
use App\Constants\MedicalSessionConstants;
use App\Constants\MedicalSessionRoomConstants;
use App\Constants\MedicineConstants;
use App\Constants\DesignatedOfMedicalSessionsConstants;
use App\Constants\RoomConstants;
use App\Constants\UserConstants;
use App\Constants\UserRoomConstants;
use App\Helpers\CommonHelper;
use App\Helpers\RoleHelper;
use App\Models\MedicalSession;
use App\Models\MedicalSessionRoom;
use App\Models\DesignatedServiceOfMedicalSession;
use App\Repositories\BaseRepository;
use App\Constants\DepartmentsConstants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MedicalSessionRepository extends BaseRepository implements MedicalSessionRepositoryInterface
{
    protected $model;

    public function getModel()
    {
        return MedicalSession::class;
    }

    public function list(array $data, $paginate = false, $select = CommonConstants::SELECT_ALL, $searchPayment = null)
    {
        $query = $this->model
            ->select(
                MedicalSessionConstants::TABLE_NAME . ".*",
                CadresConstants::TABLE_NAME . "." . CadresConstants::COLUMN_NAME . ' as cadres_name',
                CadresConstants::TABLE_NAME . "." . CadresConstants::COLUMN_PHONE,
                CadresConstants::TABLE_NAME . "." . CadresConstants::COLUMN_GENDER,
                CadresConstants::TABLE_NAME . "." . CadresConstants::COLUMN_IDENTITY_CARD_NUMBER,
                CityConstants::TABLE_NAME . "." . CityConstants::COLUMN_NAME . ' as city_name',
                CadresConstants::TABLE_NAME . "." . CadresConstants::COLUMN_CITY_ID,
                DB::raw("DATE_FORMAT(" . CadresConstants::TABLE_NAME . ".birthday, '%Y') as birthday"),
                MedicalSessionRoomConstants::TABLE_NAME . "." . MedicalSessionRoomConstants::COLUMN_ROOM_ID
                . " as medical_session_room_tbl_room_id",
                RoomConstants::TABLE_NAME. "." .RoomConstants::COLUMN_NAME
                . " as room_name",
                MedicalSessionRoomConstants::TABLE_NAME. "." .MedicalSessionRoomConstants::COLUMN_ORDINAL
                . " as ordinal",
                MedicalSessionConstants::TABLE_NAME . '.*',
            )
            ->leftJoin(CadresConstants::TABLE_NAME, function ($join) {
                $join->on(
                    CadresConstants::TABLE_NAME . '.' . CadresConstants::COLUMN_ID,
                    CommonConstants::OPERATOR_EQUAL,
                    MedicalSessionConstants::TABLE_NAME . '.' . MedicalSessionConstants::COLUMN_CADRE_ID
                )
                    ->whereNull(CadresConstants::TABLE_NAME . "." . CommonConstants::DELETED_AT);
            })->leftJoin(CityConstants::TABLE_NAME, function ($join) {
            $join->on(
                CityConstants::TABLE_NAME . "." . CityConstants::COLUMN_ID,
                CommonConstants::OPERATOR_EQUAL,
                CadresConstants::TABLE_NAME . "." . CadresConstants::COLUMN_CITY_ID
            )
                ->whereNull(CityConstants::TABLE_NAME . "." . CommonConstants::DELETED_AT);
        })
            ->join(MedicalSessionRoomConstants::TABLE_NAME, function ($join) {
                $join->on(
                    MedicalSessionConstants::TABLE_NAME . '.' . MedicalSessionConstants::COLUMN_ID,
                    OPERATOR_EQUAL,
                    MedicalSessionRoomConstants::TABLE_NAME . '.' . MedicalSessionRoomConstants::COLUMN_MEDICAL_SESSION_ID
                )
                    ->whereRaw('medical_session_room_tbl.id =' .
                        '(SELECT MAX(id) FROM medical_session_room_tbl' .
                        ' WHERE medical_session_room_tbl.medical_session_id = medical_sessions_tbl.id)');
            })
            ->join(
                RoomConstants::TABLE_NAME,
                RoomConstants::TABLE_NAME . '.' . RoomConstants::COLUMN_ID,
                OPERATOR_EQUAL,
                MedicalSessionRoomConstants::TABLE_NAME . '.' . MedicalSessionRoomConstants::COLUMN_ROOM_ID,
            );

        $keyword = $data[CommonConstants::KEYWORD];
        if (!empty($keyword['time'])) {
            $query->whereBetween(
                MedicalSessionConstants::COLUMN_MEDICAL_EXAMINATION_DAY,
                [$keyword['time'][0], $keyword['time'][1]]
            );
            unset($keyword['time']);
        }

        if (CommonHelper::checkKeyArray($keyword, 'multiple')) {
            $query->where(function ($query) use ($keyword, $searchPayment) {
                $query->orWhere(
                    MedicalSessionConstants::TABLE_NAME . '.' . MedicalSessionConstants::COLUMN_CODE,
                    CommonConstants::OPERATOR_LIKE,
                    "%{$keyword['multiple']}%"
                );
                $query->orWhere(
                    MedicalSessionConstants::TABLE_NAME . '.' . MedicalSessionConstants::COLUMN_CADRE_NAME,
                    CommonConstants::OPERATOR_LIKE,
                    "%{$keyword['multiple']}%"
                );
                $query->orWhere(
                    MedicalSessionConstants::TABLE_NAME . '.' . MedicalSessionConstants::COLUMN_CADRE_PHONE,
                    CommonConstants::OPERATOR_LIKE,
                    "%{$keyword['multiple']}%"
                );
            });
            unset($keyword['multiple']);
        }
        if (isset($data['room_of_examination_doctor'])) {
            $query->whereIn(
                MedicalSessionRoomConstants::TABLE_NAME . '.' . MedicalSessionRoomConstants::COLUMN_ROOM_ID,
                $data['room_of_examination_doctor']
            );
        }

        if (CommonHelper::checkKeyArray($keyword, 'room_id')) {
            $query->where(
                MedicalSessionRoomConstants::TABLE_NAME . '.' . MedicalSessionRoomConstants::COLUMN_ROOM_ID,
                $keyword['room_id']
            );
            unset($keyword['room_id']);
        }

        foreach ($keyword as $key => $value) {
            if ($value !== '' && $value !== null) {
                $query->where(
                    MedicalSessionConstants::TABLE_NAME . '.' . $key,
                    CommonConstants::OPERATOR_LIKE,
                    "%{$value}%"
                );
            }
        }


        if (!empty($data[CommonConstants::KEY_SORT_COLUMN]) && !empty($data[CommonConstants::KEY_SORT_TYPE])) {
            $sort = [
                $data[CommonConstants::KEY_SORT_COLUMN] => $data[CommonConstants::KEY_SORT_TYPE]
            ];
            $query = $this->sort($query, $sort);
        }

        if ($paginate) {
            $query = $this->paginate($query, $this->handlePaginate($data));
        }
        return $query;
    }


    public function findMedicalSessionLastInDay($currentDate)
    {
        return $this->model->whereBetween(
            'medical_examination_day',
            [$currentDate . ' 00:00:00', $currentDate . ' 23:59:59']
        )
            ->orderBy('code', 'desc')
            ->first();
    }

    public function getPaymentDetail($id)
    {
        $data = $this->model->where('id', $id)
            ->select("*", "status as examination_status", "department_id as department")
            ->with(['department:id,name,code', 'diseases', 'city:id,name'])
            ->with(['services' => function ($services) {
                $services->select(
                    'id',
                    'medical_session_id',
                    'designated_service_id',
                    'designated_service_name',
                    'designated_service_unit_price',
                    'designated_service_amount',
                    'designated_service_type_surgery',
                    'status'
                )->withWhereHas('designatedService')
                    ->where('status', OPERATOR_EQUAL, DesignatedOfMedicalSessionsConstants::WAITING_PAYMENT);
                ;
            }])
            ->with(['medicalSessionRoom' => function ($rooms) {
                $rooms->select(
                        'examination_id',
                        'examination_name as name',
                        'examination_service_price as service_unit_price',
                        'medical_session_id'
                    )
                    ->distinct('examination_id')
                    ->whereIn(
                        'status_room',
                        [
                            MedicalSessionRoomConstants::STATUS_WAITING_PAY
                        ]
                    )
                    ->limit(FIRST_TWO_RECORDS);
            }])
            ->first();
        $examinationDay = $data->getRawOriginal('medical_examination_day');
        $stt = $data->getRawOriginal('status');
        $data = $data->toArray();
        if (!empty($data['medical_session_room'])) {
            $data['examination_types'] = $data['medical_session_room'];
            unset($data['medical_session_room']);
        }
        $data['medical_examination_day'] = $examinationDay;
        $data['stt'] = $stt;

        return $data;
    }
    public function getPaymentDetailDone($id)
    {
        $data = $this->model->where('id', $id)
            ->select("*", "status as examination_status", "department_id as department")
            ->with(['department:id,name,code', 'diseases', 'city:id,name'])
            ->with(['services' => function ($services) {
                $services->select(
                    'id',
                    'medical_session_id',
                    'designated_service_id',
                    'designated_service_name',
                    'designated_service_unit_price',
                    'designated_service_amount',
                    'designated_service_type_surgery',
                    'status'
                )->withWhereHas('designatedService')
                    ->where('status', OPERATOR_EQUAL, DesignatedOfMedicalSessionsConstants::STATUS_DONE);
                ;
            }])
            ->with(['medicalSessionRoom' => function ($rooms) {
                $rooms->select(
                    'examination_id',
                    'examination_name as name',
                    'examination_service_price as service_unit_price',
                    'medical_session_id'
                )
                    ->distinct('examination_id')
                    ->whereIn(
                        'status_room',
                        [
                            MedicalSessionRoomConstants::STATUS_DONE
                        ]
                    )
                    ->limit(FIRST_TWO_RECORDS);
            }])
            ->first();
        $examinationDay = $data->getRawOriginal('medical_examination_day');
        $stt = $data->getRawOriginal('status');
        $data = $data->toArray();
        if (!empty($data['medical_session_room'])) {
            $data['examination_types'] = $data['medical_session_room'];
            unset($data['medical_session_room']);
        }
        $data['medical_examination_day'] = $examinationDay;
        $data['stt'] = $stt;

        return $data;
    }

    public function getPaymentDetailPrint($id)
    {
        $data = $this->model->where('id', $id)
            ->select("*", "status as examination_status", "department_id as department")
            ->with(['department:id,name,code', 'diseases', 'city:id,name'])
            ->with(['services' => function ($services) {
                $services->select(
                    'id',
                    'medical_session_id',
                    'designated_service_id',
                    'designated_service_name',
                    'designated_service_unit_price',
                    'designated_service_amount',
                    'designated_service_type_surgery',
                    'status'
                )->withWhereHas('designatedService')
                    ->where('status', OPERATOR_EQUAL, DesignatedOfMedicalSessionsConstants::STATUS_WAITING)
                    ->orWhere('status', OPERATOR_EQUAL, DesignatedOfMedicalSessionsConstants::WAITING_PAYMENT);
                ;
            }])
            ->with(['medicalSessionRoom' => function ($rooms) {
                $rooms->select(
                    'examination_id',
                    'examination_name as name',
                    'examination_service_price as service_unit_price',
                    'medical_session_id'
                )
                    ->distinct('examination_id')
                    ->whereIn(
                        'status_room',
                        [
                            MedicalSessionRoomConstants::STATUS_WAITING_PAY,
                            MedicalSessionRoomConstants::STATUS_WAITING,
                        ]
                    )
                    ->limit(FIRST_TWO_RECORDS);
            }])
            ->first();
        $examinationDay = $data->getRawOriginal('medical_examination_day');
        $data = $data->toArray();
        if (!empty($data['medical_session_room'])) {
            $data['examination_types'] = $data['medical_session_room'];
            unset($data['medical_session_room']);
        }
        $data['medical_examination_day'] = $examinationDay;

        return $data;
    }

    public function detail($id)
    {
        return $this->findOneOrFail($id);
    }

    public function getOrdinalInRoom($day, $roomId)
    {
        return MedicalSessionRoom::where(MedicalSessionRoomConstants::COLUMN_MEDICAL_DAY, $day)
            ->where(MedicalSessionRoomConstants::COLUMN_ROOM_ID, $roomId)
            ->orderBy(MedicalSessionRoomConstants::COLUMN_ORDINAL, ORDER_DESC)
            ->pluck(MedicalSessionRoomConstants::COLUMN_ORDINAL)
            ->first();
    }

    public function getCurrentRoom($medicalSessionId)
    {
        return MedicalSessionRoom::
            join(
                RoomConstants::TABLE_NAME,
                MedicalSessionRoomConstants::TABLE_NAME . '.' . MedicalSessionRoomConstants::COLUMN_ROOM_ID,
                OPERATOR_EQUAL,
                RoomConstants::TABLE_NAME . '.' . RoomConstants::COLUMN_ID
            )
            ->where(
                MedicalSessionRoomConstants::TABLE_NAME . '.' . MedicalSessionRoomConstants::COLUMN_MEDICAL_SESSION_ID,
                $medicalSessionId
            )
            ->orderBy(MedicalSessionRoomConstants::TABLE_NAME . '.' . MedicalSessionRoomConstants::COLUMN_ID, ORDER_DESC)
            ->first();
    }


    public function getlistByIdForeignKey($column, $id)
    {
        return $this->model->withTrashed()->where($column, $id)->get();
    }

    public function getTotalPatient($type = true)
    {
        return $this->model->distinct('cadre_id')->timeInYear($type)->count('cadre_id');
    }

    public function getTotalExamination($type = true)
    {
        return $this->model->select('id')->timeInYear($type)->count('id');
    }

    public function getRevenueMedical()
    {
        return $this->model->select(
                    DB::raw('Month(payment_at) as month, Sum(payment_price) as price')
                )
                ->where('status', MedicalSessionConstants::STATUS_DONE)
                ->whereYear('payment_at', Carbon::now()->year)
                ->groupBy('month')
                ->get()
                ->toArray();
    }

    /**
     * @param array $data
     * @param $paginate
     * @param $select
     * @param $type
     * @return
     */
    public function insuranceList(array $data, $paginate = false, $select = CommonConstants::SELECT_ALL, $type = null)
    {
        $query = $this->model
            ->select(
                MedicalSessionConstants::TABLE_NAME . "." . MedicalSessionConstants::COLUMN_CODE,
                MedicalSessionConstants::TABLE_NAME . "." . MedicalSessionConstants::COLUMN_REASON_FOR_EXAMINATION,
                MedicalSessionConstants::TABLE_NAME . "." . MedicalSessionConstants::COLUMN_DIAGNOSE,
                MedicalSessionConstants::TABLE_NAME . "." . MedicalSessionConstants::COLUMN_CONCLUDE,
                MedicalSessionConstants::TABLE_NAME . "." . MedicalSessionConstants::COLUMN_MEDICAL_EXAMINATION_DAY,
                DepartmentsConstants::TABLE_NAME . "." . DepartmentsConstants::COLUMN_NAME . " as department_name",
                MedicalSessionConstants::TABLE_NAME . "." . MedicalSessionConstants::COLUMN_CADRE_NAME,
                MedicalSessionRoomConstants::TABLE_NAME . "." . MedicalSessionRoomConstants::COLUMN_ROOM_ID,
                UserConstants::TABLE_NAME . "." . UserConstants::COLUMN_NAME . " as user_name",
                MedicalSessionConstants::TABLE_NAME . "." . MedicalSessionConstants::COLUMN_CADRE_GENDER,
                MedicalSessionConstants::TABLE_NAME . "." . MedicalSessionConstants::COLUMN_CADRE_ADDRESS,
                MedicalSessionConstants::TABLE_NAME . "." . MedicalSessionConstants::COLUMN_CADRE_BIRTHDAY
                , FolksConstants::TABLE_NAME . "." . FolksConstants::COLUMN_NAME . " as folk_name"
            )
            ->leftJoin(FolksConstants::TABLE_NAME, function ($join) {
                $join->on(
                    MedicalSessionConstants::TABLE_NAME . '.' . MedicalSessionConstants::COLUMN_CADRE_FOLK_ID,
                    CommonConstants::OPERATOR_EQUAL,
                    FolksConstants::TABLE_NAME . '.' . FolksConstants::COLUMN_ID
                )
                    ->whereNull(FolksConstants::TABLE_NAME . "." . CommonConstants::DELETED_AT);
            })
            // Join width departments
            ->leftJoin(DepartmentsConstants::TABLE_NAME, function ($join) {
                $join->on(
                    MedicalSessionConstants::TABLE_NAME . '.' . MedicalSessionConstants::COLUMN_DEPARTMENT_ID,
                    CommonConstants::OPERATOR_EQUAL,
                    DepartmentsConstants::TABLE_NAME . '.' . DepartmentsConstants::COLUMN_ID
                );
            })

            // Join medical_session_room_tbl để lấy phòng khám đầu tiên của phiên khám.
            ->join(MedicalSessionRoomConstants::TABLE_NAME, function ($join) {
                $join->on(
                    MedicalSessionConstants::TABLE_NAME . '.' . MedicalSessionConstants::COLUMN_ID,
                    OPERATOR_EQUAL,
                    MedicalSessionRoomConstants::TABLE_NAME . '.' . MedicalSessionRoomConstants::COLUMN_MEDICAL_SESSION_ID
                )
                    ->whereRaw('medical_session_room_tbl.id =' .
                        '(SELECT MIN(id) FROM medical_session_room_tbl' .
                        ' WHERE medical_session_room_tbl.medical_session_id = medical_sessions_tbl.id)');
            })
            //join users để lấy tên bác sĩ khám bệnh
            ->leftJoin(UserConstants::TABLE_NAME, function ($join) {
                $join->on(
                    UserConstants::TABLE_NAME . '.' . UserConstants::COLUMN_ID,
                    CommonConstants::OPERATOR_EQUAL,
                    MedicalSessionRoomConstants::TABLE_NAME . '.' . MedicalSessionRoomConstants::COLUMN_USER_ID
                );
            })
            // Join width medicine
            ->leftJoin(MedicineConstants::TABLE_NAME, function ($join) {
                $join->on(
                    MedicalSessionConstants::TABLE_NAME . '.' . MedicalSessionConstants::COLUMN_ID,
                    OPERATOR_EQUAL,
                    MedicineConstants::TABLE_NAME . '.' . MedicineConstants::COLUMN_MEDICAL_SESSION_ID
                );
            })
            ->groupBy('departments_mst.name',
                'medical_sessions_tbl.cadre_gender',
                'medical_sessions_tbl.cadre_address',
                'medical_sessions_tbl.cadre_birthday',
                'medical_sessions_tbl.cadre_name',
                'medical_sessions_tbl.reason_for_examination',
                'medical_sessions_tbl.diagnose',
                'medical_sessions_tbl.conclude',
                'medical_sessions_tbl.medical_examination_day'
            );

        $keyword = $data[CommonConstants::KEYWORD];
        if (!empty($keyword['time'])) {
            $query->whereBetween(
                MedicalSessionConstants::COLUMN_MEDICAL_EXAMINATION_DAY,
                [$keyword['time'][0], $keyword['time'][1]]
            );
            unset($keyword['time']);
        }

        if (!empty($keyword['room_id'])) {
            $query->where(
                MedicalSessionRoomConstants::TABLE_NAME . '.' . MedicalSessionRoomConstants::COLUMN_ROOM_ID,
                "=", $keyword['room_id']
            );
            unset($keyword['room_id']);
        }

        if (!empty($data[CommonConstants::KEY_SORT_COLUMN]) && !empty($data[CommonConstants::KEY_SORT_TYPE])) {
            $sort = [
                $data[CommonConstants::KEY_SORT_COLUMN] => $data[CommonConstants::KEY_SORT_TYPE]
            ];
            $query = $this->sort($query, $sort);
        }

        if (CommonHelper::checkKeyArray($keyword, 'multiple')) {
            $query->where(function ($query) use ($keyword, $type) {
                $query->orWhere(
                    MedicalSessionConstants::TABLE_NAME . '.' . MedicalSessionConstants::COLUMN_CODE,
                    CommonConstants::OPERATOR_LIKE,
                    "%{$keyword['multiple']}%"
                );
                $query->orWhere(
                    CadresConstants::TABLE_NAME . '.' . CadresConstants::COLUMN_NAME,
                    CommonConstants::OPERATOR_LIKE,
                    "%{$keyword['multiple']}%"
                );
                $query->orWhere(
                    CadresConstants::TABLE_NAME . '.' . CadresConstants::COLUMN_PHONE,
                    CommonConstants::OPERATOR_LIKE,
                    "%{$keyword['multiple']}%"
                );
                if (!empty($type) && $type == MedicalSessionConstants::STATUS_DONE) {
                    $query->orWhere(
                        CadresConstants::TABLE_NAME . "." . CadresConstants::COLUMN_MEDICAL_INSURANCE_NUMBER,
                        CommonConstants::OPERATOR_LIKE,
                        "%{$keyword['multiple']}%"
                    );
                }
            });
            unset($keyword['multiple']);
        }

        if (RoleHelper::getByRole([EXAMINATION_DOCTOR])) {
            $rooms = Auth::user()->room()->pluck('rooms_mst.id');
            $query->whereHas('medicalSessionRoom', function ($q) use ($rooms) {
                $q->whereIn(MedicalSessionRoomConstants::TABLE_NAME . '.' . MedicalSessionRoomConstants::COLUMN_ROOM_ID, $rooms);
            });
        }
        if ($paginate) {
            $query = $this->paginate($query, $this->handlePaginate($data));
        }

        return $query;
    }

    //đếm số ngày khám khác nhau
    public function countMedicalExaminationDay($data)
    {
        $keyword = $data[CommonConstants::KEYWORD];
        $countMedicalExaminationDay = MedicalSession::selectRaw('COUNT(DISTINCT DATE('.MedicalSessionConstants::COLUMN_MEDICAL_EXAMINATION_DAY.')) as count')
            ->whereBetween(MedicalSessionConstants::COLUMN_MEDICAL_EXAMINATION_DAY, [$keyword['time'][0], $keyword['time'][1]])
            ->first();
        $count = $countMedicalExaminationDay->count;
        unset($keyword['time']);
        return $count;
    }

    public function findTrashed($id)
    {
        return MedicalSession::withTrashed()->find($id);
    }
}
