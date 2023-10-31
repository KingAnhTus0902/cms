<?php

namespace App\Repositories\MedicalSession;

use App\Constants\CadresConstants;
use App\Constants\CityConstants;
use App\Constants\CommonConstants;
use App\Constants\DesignatedServiceConstants;
use App\Constants\DiseasesOfMedicalSessionsConstants;
use App\Constants\FolksConstants;
use App\Constants\MaterialConstants;
use App\Constants\MedicalSessionConstants;
use App\Constants\MedicalSessionRoomConstants;
use App\Constants\MedicineConstants;
use App\Constants\PrescriptionConstants;
use App\Constants\DesignatedOfMedicalSessionsConstants;
use App\Constants\RoomConstants;
use App\Constants\UserConstants;
use App\Constants\UserRoomConstants;
use App\Helpers\CommonHelper;
use App\Helpers\RoleHelper;
use App\Models\Cadres;
use App\Models\MedicalSession;
use App\Models\MedicalSessionRoom;
use App\Models\PrescriptionOfMedicalSession;
use App\Models\DesignatedServiceOfMedicalSession;
use App\Repositories\BaseRepository;
use App\Constants\DepartmentsConstants;
use App\Repositories\Hospital\HospitalRepositoryInterface;
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
                CadresConstants::TABLE_NAME . "." . CadresConstants::COLUMN_MEDICAL_INSURANCE_NUMBER,
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
                if (!empty($searchPayment)) {
                    $query->orWhere(
                        CadresConstants::TABLE_NAME . "." . CadresConstants::COLUMN_MEDICAL_INSURANCE_NUMBER,
                        CommonConstants::OPERATOR_LIKE,
                        "%{$keyword['multiple']}%"
                    );
                }
            });
            unset($keyword['multiple']);
        }

        if (!empty($searchPayment)) {
            $paymentStatus = $keyword['payment_status'] ?? MedicalSessionConstants::UNPAID_STATUS;
            $query->where(
                MedicalSessionConstants::TABLE_NAME . "." . MedicalSessionConstants::COLUMN_STATUS,
                OPERATOR_NOT_EQUAL,
                MedicalSessionConstants::STATUS_CANCEL
            );
            if ($paymentStatus != MedicalSessionConstants::ALL_PAYMENT_STATUS){
                $query->where(
                    MedicalSessionConstants::TABLE_NAME . "." . MedicalSessionConstants::COLUMN_PAYMENT_STATUS,
                    $paymentStatus
                );
            }
            unset($keyword['payment_status']);
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

        if (!empty($data['get_prescription'])) {
            $query->completedSession();
            $query->whereHas('prescription', function ($queryPrescription) use ($data) {
                if (!empty($data['prescription_status'])) {
                    $queryPrescription->where('prescription_of_medical_sessions_tbl.status', $data['prescription_status']);
                }
            });
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

    public function getInsurancePaidList(array $data, $paginate = false, $select = CommonConstants::SELECT_ALL, $type = null)
    {
        $mstHospital = app(HospitalRepositoryInterface::class)->getMstHospital();

        $query = $this->model
            ->select(
                DB::raw('ROW_NUMBER() OVER (PARTITION BY (CASE
                        WHEN hospitals_mst.id = ' . $mstHospital->id . '
                            THEN ' . MedicalSessionConstants::ORIGINAL_PROVINCE_HOSPITAL_LINE . '
                        WHEN hospitals_mst.city_id = ' . $mstHospital->city_id . '
                            THEN ' . MedicalSessionConstants::INNER_PROVINCE_TO_HOSPITAL_LINE . '
                        ELSE ' . MedicalSessionConstants::OUT_OF_PROVINCE_TO_HOSPITAL_LINE . ' END
                    )) number'),
                "medical_sessions_tbl.id",
                "medical_sessions_tbl.payment_price",
                "medical_sessions_tbl.health_insurance_fund",
                "medical_sessions_tbl.patient_pay",
                "medical_sessions_tbl.benefit_rate",
                "medical_sessions_tbl.medical_examination_day",
                "medical_sessions_tbl.cadre_name as cadres_name",
                DB::raw("(case when medical_sessions_tbl.cadre_gender=0 then medical_sessions_tbl.cadre_birthday else null end) as male_birthday"),
                DB::raw("(case when medical_sessions_tbl.cadre_gender=1 then medical_sessions_tbl.cadre_birthday else null end) as female_birthday"),
                "medical_sessions_tbl.cadre_medical_insurance_number as medical_insurance_number",
                "medical_sessions_tbl.cadre_hospital_code as hospital_code",
                DB::raw(
                    '(CASE
                        WHEN hospitals_mst.id = ' . $mstHospital->id . '
                            THEN ' . MedicalSessionConstants::ORIGINAL_PROVINCE_HOSPITAL_LINE . '
                        WHEN hospitals_mst.city_id = ' . $mstHospital->city_id . '
                            THEN ' . MedicalSessionConstants::INNER_PROVINCE_TO_HOSPITAL_LINE . '
                        ELSE ' . MedicalSessionConstants::OUT_OF_PROVINCE_TO_HOSPITAL_LINE . ' END
                    ) AS hospital_line'
                ),
                DB::raw("
                    (select sum(`medicine_of_medical_sessions_tbl`.`materials_insurance_unit_price` * `medicine_of_medical_sessions_tbl`.`materials_amount`)
                    from `medicine_of_medical_sessions_tbl`
                    inner join `prescription_of_medical_sessions_tbl`
                    on `prescription_of_medical_sessions_tbl`.`id` = `medicine_of_medical_sessions_tbl`.`prescription_id`
                    where `medical_sessions_tbl`.`id` = `prescription_of_medical_sessions_tbl`.`medical_session_id`
                    and `medicine_of_medical_sessions_tbl`.`deleted_at` is null
                    and `prescription_of_medical_sessions_tbl`.`deleted_at` is null
                    and `prescription_of_medical_sessions_tbl`.`status` = 2
                    and `medicine_of_medical_sessions_tbl`.`use_insurance` = 1
                    and `medicine_of_medical_sessions_tbl`.`status` = 2) as `medicine`
                "), //Thuốc
                DB::raw(
                    "sum(case when designated_service_of_medical_sessions_tbl.designated_service_type_surgery = '1'
                then designated_service_of_medical_sessions_tbl.designated_insurance_unit_price * designated_service_of_medical_sessions_tbl.designated_service_amount
                else 0 end) as xet_nghiem"
                ), //Tổng tiền xét nghiệm
                DB::raw("sum(case when designated_service_of_medical_sessions_tbl.designated_service_type_surgery = '2'
                then designated_service_of_medical_sessions_tbl.designated_insurance_unit_price * designated_service_of_medical_sessions_tbl.designated_service_amount
                else 0 end) as cdha"), //Tổng tiền chần đoán hình ảnh
                DB::raw("sum(case when designated_service_of_medical_sessions_tbl.designated_service_type_surgery = '3'
                then designated_service_of_medical_sessions_tbl.designated_insurance_unit_price * designated_service_of_medical_sessions_tbl.designated_service_amount
                else 0 end) as tdcn"), //tổng tiền thăm dò chức năng
                DB::raw("sum(case when designated_service_of_medical_sessions_tbl.designated_service_type_surgery = '4'
                then designated_service_of_medical_sessions_tbl.designated_insurance_unit_price * designated_service_of_medical_sessions_tbl.designated_service_amount
                else 0 end) as ttpt") //Tổng tiền thủ thuật phẫu thuật

            )
            ->with('diseases')
            ->with(['medicalSessionRoom' => function ($rooms) {
                $rooms->select(
                        'examination_id',
                        'examination_name as name',
                        'examination_insurance_price as insurance_unit_price',
                        'examination_service_price as service_unit_price',
                        'medical_session_id'
                    )
                    ->distinct('examination_id')
                    ->where('status_room', MedicalSessionRoomConstants::STATUS_DONE);
            }])
            ->leftJoin("hospitals_mst", function ($join) {
                $join->on("hospitals_mst.code", "=", "medical_sessions_tbl.cadre_hospital_code");
            })
            ->leftJoin("designated_service_of_medical_sessions_tbl", function ($join) {
                $join->on(
                    "medical_sessions_tbl.id", "=", "designated_service_of_medical_sessions_tbl.medical_session_id"
                )->where("designated_service_of_medical_sessions_tbl.status", "=", DesignatedOfMedicalSessionsConstants::STATUS_DONE);
            })
            ->where("medical_sessions_tbl.use_medical_insurance", "=", MedicalSessionConstants::USE_INSURANCE)
            ->where("medical_sessions_tbl.payment_status", "=", MedicalSessionConstants::PAID_STATUS);

        $keyword = $data[CommonConstants::KEYWORD];
        if (!empty($keyword['time'])) {
            $query->whereBetween(
                MedicalSessionConstants::COLUMN_MEDICAL_EXAMINATION_DAY,
                [$keyword['time'][0], $keyword['time'][1]]
            );
            unset($keyword['time']);
        }
        $query->groupBy(
            'medical_sessions_tbl.id'
        );
        $sort = [
            'hospital_line' => 'asc',
            'number' => 'asc'
        ];
        $query = $this->sort($query, $sort);

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
            ->select("*", "payment_status as is_payment", "status as examination_status", "department_id as department")
            ->with(['department:id,name,code', 'diseases', 'city:id,name'])
            ->with(['services' => function ($services) {
                $services->select(
                    'id',
                    'medical_session_id',
                    'designated_service_id',
                    'designated_service_name',
                    'designated_service_unit_price',
                    'designated_insurance_unit_price',
                    'payment_status',
                    'designated_service_amount',
                    'designated_service_type_surgery',
                    'status'
                )->withWhereHas('designatedService')
                ->where('status', OPERATOR_NOT_EQUAL, DesignatedOfMedicalSessionsConstants::STATUS_CANCEL);
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
                            MedicalSessionRoomConstants::STATUS_WAITING,
                            MedicalSessionRoomConstants::STATUS_DOING,
                            MedicalSessionRoomConstants::STATUS_DONE,
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
//        dd($data);
        return $data;
    }

    public function detail($id)
    {
        return $this->findOneOrFail($id);
    }

    public function getOrdinalInRoom($day, $roomId, $type, bool $getAll)
    {
        if ($getAll) {
            $result = MedicalSessionRoom::where(MedicalSessionRoomConstants::COLUMN_MEDICAL_DAY, $day)
                ->where(MedicalSessionRoomConstants::COLUMN_ROOM_ID, $roomId)
                ->where(MedicalSessionRoomConstants::COLUMN_TYPE, $type)
                ->orderBy(MedicalSessionRoomConstants::COLUMN_ORDINAL, ORDER_DESC)
                ->pluck(MedicalSessionRoomConstants::COLUMN_ORDINAL)
                ->toArray();
        } else {
            $result = MedicalSessionRoom::where(MedicalSessionRoomConstants::COLUMN_MEDICAL_DAY, $day)
                ->where(MedicalSessionRoomConstants::COLUMN_ROOM_ID, $roomId)
                ->where(MedicalSessionRoomConstants::COLUMN_TYPE, $type)
                ->orderBy(MedicalSessionRoomConstants::COLUMN_ORDINAL, ORDER_DESC)
                ->pluck(MedicalSessionRoomConstants::COLUMN_ORDINAL)
                ->first();
        }
        return $result;
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

    public function updatePrescriptionByMedicalSessionId($medicalSessionId, $data)
    {
        return PrescriptionOfMedicalSession::where('medical_session_id', $medicalSessionId)->update($data);
    }

    public function updateDesignatedByMedicalSessionId($medicalSessionId, $data)
    {
        return DesignatedServiceOfMedicalSession::where('medical_session_id', $medicalSessionId)->update($data);
    }
    public function getlistByIdForeignKey($column, $id)
    {
        return $this->model->withTrashed()->where($column, $id)->get();
    }

    public function getMeidcalsessionRoom($column, $id)
    {
        return MedicalSessionRoom::where($column, $id)->first();
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
                ->where('payment_status', 1)
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
        $queryGroupmedial = DB::table('medicine_of_medical_sessions_tbl as A')
            ->select('B.medical_session_id', DB::raw('GROUP_CONCAT(A.materials_name SEPARATOR \'; \') as combined_data'))
            ->join(DB::raw('(select pre.id, medical.id as medical_session_id from prescription_of_medical_sessions_tbl pre join medical_sessions_tbl medical on pre.medical_session_id = medical.id) as B'), 'B.id', '=', 'A.prescription_id')
            ->groupBy('A.prescription_id');

        $query = $this->model
            ->select(
//                MedicalSessionConstants::TABLE_NAME.".*"
                MedicalSessionConstants::TABLE_NAME.".".MedicalSessionConstants::COLUMN_CODE,
                MedicalSessionConstants::TABLE_NAME.".".MedicalSessionConstants::COLUMN_REASON_FOR_EXAMINATION,
                MedicalSessionConstants::TABLE_NAME.".".MedicalSessionConstants::COLUMN_DIAGNOSE,
                MedicalSessionConstants::TABLE_NAME.".".MedicalSessionConstants::COLUMN_MEDICAL_EXAMINATION_DAY,
                DepartmentsConstants::TABLE_NAME.".".DepartmentsConstants::COLUMN_NAME." as department_name",
                MedicalSessionConstants::TABLE_NAME.".".MedicalSessionConstants::COLUMN_CADRE_NAME,
                MedicalSessionRoomConstants::TABLE_NAME. "." .MedicalSessionRoomConstants::COLUMN_ROOM_ID,
                UserConstants::TABLE_NAME. "." .UserConstants::COLUMN_NAME." as user_name",
                MedicalSessionConstants::TABLE_NAME.".".MedicalSessionConstants::COLUMN_CADRE_MEDICAL_INSURANCE_NUMBER,
                MedicalSessionConstants::TABLE_NAME.".".MedicalSessionConstants::COLUMN_CADRE_GENDER,
                MedicalSessionConstants::TABLE_NAME.".".MedicalSessionConstants::COLUMN_CADRE_ADDRESS,
                MedicalSessionConstants::TABLE_NAME.".".MedicalSessionConstants::COLUMN_CADRE_BIRTHDAY
                ,FolksConstants::TABLE_NAME.".".FolksConstants::COLUMN_NAME." as folk_name"
                ,"subQ.combined_data"
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
            ->leftJoin(UserRoomConstants::TABLE_NAME, function ($join) {
                $join->on(
                    MedicalSessionRoomConstants::TABLE_NAME . '.' . MedicalSessionRoomConstants::COLUMN_ROOM_ID,
                    CommonConstants::OPERATOR_EQUAL,
                    UserRoomConstants::TABLE_NAME . '.' . UserRoomConstants::COLUMN_ROOM_ID
                );
            })
            //join users để lấy tên bác sĩ khám bệnh
            ->leftJoin(UserConstants::TABLE_NAME, function ($join) {
                $join->on(
                    UserConstants::TABLE_NAME . '.' . UserConstants::COLUMN_ID,
                    CommonConstants::OPERATOR_EQUAL,
                    UserRoomConstants::TABLE_NAME . '.' . UserRoomConstants::COLUMN_USER_ID
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
            -> leftJoinSub($queryGroupmedial,'subQ', function ($join) {
                $join->on(
                    MedicalSessionConstants::TABLE_NAME . '.' . MedicalSessionConstants::COLUMN_ID,
                    OPERATOR_EQUAL,
                    "subQ.medical_session_id"
                );
            })
            ->groupBy('departments_mst.name' ,
                'medical_sessions_tbl.cadre_medical_insurance_number',
                'medical_sessions_tbl.cadre_gender',
                'medical_sessions_tbl.cadre_address',
                'medical_sessions_tbl.cadre_birthday',
                'medical_sessions_tbl.cadre_name',
                'subQ.combined_data',
                'medical_sessions_tbl.reason_for_examination',
                'medical_sessions_tbl.diagnose',
                'medical_sessions_tbl.medical_examination_day'
            )
        ;

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
