<?php

namespace App\Services;

use App\Constants\CadresConstants;
use App\Constants\CommonConstants;
use App\Constants\MedicalSessionConstants;
use App\Constants\MedicalSessionRoomConstants;
use App\Constants\PrescriptionConstants;
use App\Constants\DesignatedServiceConstants;
use App\Helpers\CommonHelper;
use App\Helpers\QueryHelper;
use App\Helpers\TextFormatHelper;
use App\Models\DesignatedServiceOfMedicalSession;
use App\Models\MedicalSessionRoom;
use App\Repositories\Cadres\CadresRepositoryInterface;
use App\Repositories\MedicalSession\MedicalSessionRepositoryInterface;
use App\Repositories\HealthInsuranceCardHead\HealthInsuranceCardHeadRepositoryInterface;
use App\Repositories\Room\RoomRepositoryInterface;
use App\Repositories\Setting\SettingRepositoryInterface;
use App\Repositories\Hospital\HospitalRepositoryInterface;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;
use Ramsey\Collection\Collection;


class MedicalSessionService extends BaseService
{
    /**
     * @var mainRepository
     */
    protected $mainRepository;
    /**
     * @var cadresRepository
     */
    protected $cadresRepository;
    /**
     * @var roomRepository
     */

    protected $roomRepository;

    /**
     * @var settingRepository
     */
    protected $settingRepository;

    /**
     * @var HospitalRepository
     */
    protected $hospitalRepository;

    /**
     * Constructor
     * Before
     * @param MedicalSessionRepositoryInterface $medicalSessionRepositoryInterface
     * @param CadresRepositoryInterface $cadresRepository
     * @param SettingRepositoryInterface $settingRepository
     * @param HospitalRepositoryInterface $hospitalRepository
     */
    public function __construct(
        MedicalSessionRepositoryInterface $medicalSessionRepositoryInterface,
        CadresRepositoryInterface $cadresRepository,
        RoomRepositoryInterface $roomRepository,
        SettingRepositoryInterface $settingRepository,
        HospitalRepositoryInterface $hospitalRepository
    ) {
        $this->mainRepository = $medicalSessionRepositoryInterface;
        $this->cadresRepository = $cadresRepository;
        $this->roomRepository = $roomRepository;
        $this->settingRepository = $settingRepository;
        $this->hospitalRepository = $hospitalRepository;
    }

    public function list($data, $paginate, $searchPayment = null)
    {
        $time = [
            0 => Carbon::today()->toDateString() . ' 00:00:00',
            1 => Carbon::today()->toDateString() . ' 23:59:59'
        ];
        if (!empty($data[CommonConstants::KEYWORD]['time'])) {
            $time = explode('-', $data[CommonConstants::KEYWORD]['time']);
            $time[0] = Carbon::createFromFormat('d/m/Y', trim($time[0]))->format('Y-m-d') . ' 00:00:00';
            $time[1] = Carbon::createFromFormat('d/m/Y', trim($time[1]))->format('Y-m-d') . ' 23:59:59';
        }
        $data[CommonConstants::KEYWORD]['time'] = $time;
        $medicalSessions = $this->mainRepository->list($data, $paginate, ['*'], $searchPayment);
        return [
            'medicalSessions' => $medicalSessions,
            'itemStart' => $medicalSessions->firstItem(),
            'itemEnd' => $medicalSessions->lastItem(),
            'total' => $medicalSessions->total(),
            'lastPage' => $medicalSessions->lastPage(),
            'limit' => CommonConstants::DEFAULT_LIMIT_PAGE,
            'page' => $data[CommonConstants::INPUT_PAGE] ?? 1,
            'sort_column' => $data[CommonConstants::KEY_SORT_COLUMN] ?? '',
            'sort_type' => $data[CommonConstants::KEY_SORT_TYPE] ?? ''
        ];
    }

    /**
     * Create medical session
     * @param $data
     * @param $cadre
     * @return Exception|bool
     */
    public function createMedicalSession($data, $cadre): Exception|bool
    {
        $currentDate = Carbon::now()->format('Y/m/d');
        $codeMedical = str_replace('/', '', $currentDate);
        $lastMedicalSession = $this->mainRepository->findMedicalSessionLastInDay($currentDate);
        $codeMedical = $codeMedical . '0001';
        if ($lastMedicalSession) {
            $codeMedical = (int)$lastMedicalSession->code + 1;
        }
        $dataMedical = [
            'code' => $codeMedical,
            'department_id' => $data['department_id'] ?? null,
            'reason_for_examination' => $data['reason_for_examination'],
            'medical_examination_day' => date(YEAR_MONTH_DAY_HIS),
            'cadre_id' => $data['cadre_id'],
            'cadre_code' => $cadre->code,
            'cadre_name' => $cadre->name,
            'cadre_identity_card_number' => $cadre->identity_card_number,
            'cadre_birthday' => $cadre->birthday,
            'cadre_gender' => $cadre->gender,
            'cadre_folk_id' => $cadre->folk_id,
            'cadre_phone' => $cadre->phone,
            'cadre_email' => $cadre->email,
            'cadre_city_id' => $cadre->city_id,
            'cadre_district_id' => $cadre->district_id,
            'cadre_address' => $cadre->address,
            'cadre_job' => $cadre->job,
        ];

        DB::beginTransaction();
        try {
            $medicalSession = $this->mainRepository->create($dataMedical);
            $room = $this->roomRepository->findOneOrFail($data['room_id']);
            $medicalSessionRoom = new MedicalSessionRoom();
            $medicalSessionRoom->{MedicalSessionRoomConstants::COLUMN_MEDICAL_SESSION_ID} = $medicalSession->id;
            $medicalSessionRoom->{MedicalSessionRoomConstants::COLUMN_ROOM_ID} = $data['room_id'];
            $medicalSessionRoom->{MedicalSessionRoomConstants::COLUMN_STATUS_ROOM}
                = MedicalSessionConstants::STATUS_WAITING;
            $medicalSessionRoom->{MedicalSessionRoomConstants::COLUMN_MEDICAL_DAY} = date('Y-m-d');
            $medicalSessionRoom->{MedicalSessionRoomConstants::COLUMN_ORDINAL}
                = $this->getOrdinalInRoom(date('Y-m-d'), $data['room_id']);
            $medicalSessionRoom->{MedicalSessionRoomConstants::COLUMN_EXAMINATION_ID}
                = $room->examinationType->id ?? null;
            $medicalSessionRoom->{MedicalSessionRoomConstants::COLUMN_EXAMINATION_NAME}
                = $room->examinationType->name ?? null;
            $medicalSessionRoom->{MedicalSessionRoomConstants::COLUMN_EXAMINATION_INSURANCE_PRICE}
                = $room->examinationType->insurance_unit_price ?? null;
            $medicalSessionRoom->{MedicalSessionRoomConstants::COLUMN_EXAMINATION_SERVICE_PRICE}
                = $room->examinationType->service_unit_price ?? null;
            $medicalSessionRoom->save();
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }
    }

    public function paymentDetail($id)
    {
        try {
            $data = $this->mainRepository->getPaymentDetail($id);
            $setting = $this->settingRepository->first();
                $servicesServiceCost = ZERO_PRICE;
                $otherServices = ZERO_PRICE;
                $hospitalName = null;
                // calculate sum
                $examinationsServiceCost = !empty($data['examination_types']) ? array_sum(
                    array_column($data['examination_types'], 'service_unit_price')
                ) : 0;

                $data['service'] = $data['services'];
                $data['services'] = [];
                if (!empty($data['service'])) {
                    foreach ($data['service'] as $key => $value) {
                        $service = (int) $value['designated_service_unit_price']
                                        * $value['designated_service_amount'];
                        $value['total_service'] = $service;
                        $value['type_surgery'] = $value['designated_service_type_surgery']
                            ?? DesignatedServiceConstants::TYPE_TEST;
                        $otherServices = $otherServices + $service;
                        unset($value['designated_service']);
                        $data['services'][$value['type_surgery']][] = $value;
                    }
                    ksort($data['services']);
                    unset($data['service']);
                }
                $sumService = $examinationsServiceCost + $otherServices;


                $data['examination_start_invoice'] = CommonHelper::formatDateInvoice(
                                                    $data['medical_examination_day'], 'Y-m-d H:i:s');
                $data['examination_end_invoice'] = CommonHelper::formatDateInvoice(
                                                    $data['medical_examination_day_end'], 'Y-m-d H:i:s');
                $data['examinations_service_cost'] = $examinationsServiceCost;
                $data['services_service_cost'] = $otherServices;
                $data['sum_service'] = $sumService;
                $data['other_services'] = $sumService;
                $data['city_name'] = $data['cadre_city_id'] ?? null;
                $data['clinic_name'] = $setting->clinic_name ?? null;
                $data['ministry_of_health'] = $setting->ministry_of_health ?? null;
                $data['hospital_name'] = $hospitalName;
                return $data;
        } catch (Throwable $e) {
            report($e);
        }

        return null;
    }

    public function detail($id)
    {
        $medicalSession = $this->mainRepository->detail($id);
        $medicalSessionRoom = MedicalSessionRoom::where('medical_session_id', $medicalSession->id)
           ->orderBy('id', 'DESC')
           ->first();
        return [
           'name' => $medicalSession->cadre_name,
           'identity_card_number' => $medicalSession->cadre_identity_card_number,
           'birthday' => $medicalSession->cadre_birthday,
           'gender' => $medicalSession->getRawOriginal('cadre_gender'),
           'folk_id' => $medicalSession->cadre_folk_id,
           'city_id' => $medicalSession->getRawOriginal('cadre_city_id'),
           'district_id' => $medicalSession->cadre_district_id,
           'phone' => $medicalSession->cadre_phone,
           'job' => $medicalSession->cadre_job,
           'email' => $medicalSession->cadre_email,
           'address' => $medicalSession->cadre_address,
           'department_id' => $medicalSession->getRawOriginal('department_id'),
           'room_id' => $medicalSessionRoom->room_id,
           'reason_for_examination' => $medicalSession->reason_for_examination,
           'id_medical_session_hidden' => $medicalSession->id,
           'cadre_id_check' => $medicalSession->cadre_id,
           'id_medical_session_room_hidden' => $medicalSessionRoom->id,
           ''
        ];
    }


    public function update($data)
    {
        $medicalSession = $this->mainRepository->findOneOrFail($data['id_medical_session_hidden']);
        $medicalSessionRoom = MedicalSessionRoom::findOrFail($data['id_medical_session_room_hidden']);
        DB::beginTransaction();
        try {
            $medicalSession->{MedicalSessionConstants::COLUMN_DEPARTMENT_ID} = $data['department_id'] ?? null;
            $medicalSession->{MedicalSessionConstants::COLUMN_REASON_FOR_EXAMINATION} = $data['reason_for_examination'];
            if ($data['room_id'] != $medicalSessionRoom->room_id) {
                $room = $this->roomRepository->findOneOrFail($data['room_id']);
                $medicalSessionRoom->{MedicalSessionRoomConstants::COLUMN_ROOM_ID} = $data['room_id'];
                $medicalSessionRoom->{MedicalSessionRoomConstants::COLUMN_ORDINAL}
                    = $this->getOrdinalInRoom($medicalSessionRoom->medical_day, $data['room_id']);
                $medicalSessionRoom->{MedicalSessionRoomConstants::COLUMN_EXAMINATION_ID}
                    = $room->examinationType->id ?? null;
                $medicalSessionRoom->{MedicalSessionRoomConstants::COLUMN_EXAMINATION_NAME}
                    = $room->examinationType->name ?? null;
                $medicalSessionRoom->{MedicalSessionRoomConstants::COLUMN_EXAMINATION_INSURANCE_PRICE}
                    = $room->examinationType->insurance_unit_price ?? null;
                $medicalSessionRoom->{MedicalSessionRoomConstants::COLUMN_EXAMINATION_SERVICE_PRICE}
                    = $room->examinationType->service_unit_price ?? null;
            }
            $medicalSession->save();
            $medicalSessionRoom->save();
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }
    }

    public function updateCadreAndMedicalSession($data)
    {
        DB::beginTransaction();
        try {
            $cadre = $this->cadresRepository->findOneOrFail($data['cadre_id_check']);
            $cadre->update($data);
            $medicalSession = $this->mainRepository->findOneOrFail($data['medical_session_id']);
            $medicalSession->cadre_id = $cadre->id;
            $medicalSession->cadre_code = $cadre->code;
            $medicalSession->cadre_name = $cadre->name;
            $medicalSession->cadre_identity_card_number = $cadre->identity_card_number;
            $medicalSession->cadre_birthday = $cadre->birthday;
            $medicalSession->cadre_gender = $cadre->gender;
            $medicalSession->cadre_folk_id = $cadre->folk_id;
            $medicalSession->cadre_phone = $cadre->phone;
            $medicalSession->cadre_email = $cadre->email;
            $medicalSession->cadre_city_id = $cadre->city_id;
            $medicalSession->cadre_district_id = $cadre->district_id;
            $medicalSession->cadre_address = $cadre->address;
            $medicalSession->cadre_job = $cadre->job;
            $medicalSession->save();
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }
    }

    public function changeRoom($data)
    {
        DB::beginTransaction();
        try {
            MedicalSessionRoom::
            where(MedicalSessionRoomConstants::COLUMN_MEDICAL_SESSION_ID, $data['id_medical_session'])
                ->update([MedicalSessionRoomConstants::COLUMN_STATUS_ROOM => MedicalSessionRoomConstants::STATUS_DONE]);
            $room = $this->roomRepository->findOneOrFail($data['id_room']);
            $medicalSessionRoom = new MedicalSessionRoom();
            $medicalSessionRoom->{MedicalSessionRoomConstants::COLUMN_MEDICAL_SESSION_ID} = $data['id_medical_session'];
            $medicalSessionRoom->{MedicalSessionRoomConstants::COLUMN_ROOM_ID} = $data['id_room'];
            $medicalSessionRoom->{MedicalSessionRoomConstants::COLUMN_MEDICAL_DAY} = date('Y-m-d');
            $medicalSessionRoom->{MedicalSessionRoomConstants::COLUMN_ORDINAL}
                = $this->getOrdinalInRoom(date('Y-m-d'), $data['id_room']);
            $medicalSessionRoom->{MedicalSessionRoomConstants::COLUMN_EXAMINATION_ID}
                = $room->examinationType->id ?? null;
            $medicalSessionRoom->{MedicalSessionRoomConstants::COLUMN_EXAMINATION_NAME}
                = $room->examinationType->name ?? null;
            $medicalSessionRoom->{MedicalSessionRoomConstants::COLUMN_EXAMINATION_INSURANCE_PRICE}
                = $room->examinationType->insurance_unit_price ?? null;
            $medicalSessionRoom->{MedicalSessionRoomConstants::COLUMN_EXAMINATION_SERVICE_PRICE}
                = $room->examinationType->service_unit_price ?? null;
            $medicalSessionRoom->save();
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }
    }

    public function getCurrentRoom($medicalSessionId)
    {
        return $this->mainRepository->getCurrentRoom($medicalSessionId);
    }
    public function getOrdinalInRoom($medicalDay, $roomId): int
    {
        $lastOrdinalInRoom = $this->mainRepository->getOrdinalInRoom(
            $medicalDay,
            $roomId,
            MedicalSessionRoomConstants::TYPE_RECEPTION_CREATED,
            false
        );
        $arrayOrdinalByTypeInRoom = $this->mainRepository->getOrdinalInRoom(
            $medicalDay,
            $roomId,
            MedicalSessionRoomConstants::TYPE_USER_BOOKED,
            true
        );

        $ordinal = ($lastOrdinalInRoom ?? 0) + 1;
        if (!$arrayOrdinalByTypeInRoom) {
            return $ordinal;
        }

        while (in_array($ordinal, $arrayOrdinalByTypeInRoom)) {
            $ordinal++;
        }
        return $ordinal;
    }
    public function checkStatusWaitingAndProcessingDSOfMedicalSession ($medical)
    {
        $medicals = $medical->services;
        $check = 0;
        foreach ($medicals as $key) {
            if ($key['status'] === DesignatedServiceOfMedicalSession::WAITING || $key['status'] === DesignatedServiceOfMedicalSession::PROCESSING) {
                $check ++;
            }
        }
        return $check;
    }
    public function checkStatusFinishAndProcessingDSOfMedicalSession ($medical)
    {
        $medicals = $medical->services;
        $check = 0;
        foreach ($medicals as $key) {
            if ($key['status'] === DesignatedServiceOfMedicalSession::FINISH || $key['status'] === DesignatedServiceOfMedicalSession::PROCESSING) {
                $check ++;
            }
        }
        return $check;
    }
    public function checkStatusWatingDSOfMedicalSession ($medical)
    {
        $medicals = $medical->services;
        $check = 0;
        foreach ($medicals as $key) {
            if ($key['status'] === DesignatedServiceOfMedicalSession::WAITING) {
                $check ++;
            }
        }
        return $check;
    }

    public function getDashboardData()
    {
        try {
            $totalPatient = $this->mainRepository->getTotalPatient();
            $totalPatientLastMonth = $this->mainRepository->getTotalPatient(false);
            $totalExamination = $this->mainRepository->getTotalExamination();
            $totalExaminationLastMonth = $this->mainRepository->getTotalExamination(false);
            $revenueMedical = $this->mainRepository->getRevenueMedical();
            return [
                'totalPatient' => $totalPatient,
                'totalPatientLastMonth' => $totalPatientLastMonth,
                'totalExamination' => $totalExamination,
                'totalExaminationLastMonth' => $totalExaminationLastMonth,
                'revenueMedical' => CommonHelper::sortValueByMonth($revenueMedical),
            ];
        } catch (Throwable $e) {
            report($e);
        }
        return [
            'totalPatient' => null,
            'totalPatientLastMonth' => null,
            'totalExamination' => null,
            'totalExaminationLastMonth' => null,
            'revenueMedical' => CommonHelper::sortValueByMonth([]),
        ];
    }

    public function changePaymentStatus($id, $data, $action = MedicalSessionConstants::PAID_STATUS)
    {
        DB::beginTransaction();
        try {
            $data['payment_status'] = $action;
            $payment = $this->mainRepository->find($id);
            if (!empty($payment)) {
                if ($payment->getRawOriginal('payment_status') != $action) {
                    $data['payment_at'] = Carbon::now();
                }
                if (!empty($data['not_change_payment_status']))
                {
                    unset($data['payment_status']);
                }
                unset($data['not_change_payment_status']);
                $medicalData = $data;
                $medicalData['payment_price'] = $medicalData['medical_price'];
                unset($medicalData['medical_price']);
                $this->mainRepository->updates($payment, $medicalData);
                $this->mainRepository->updateDesignatedByMedicalSessionId($id, ['payment_status' => $action]);
                DB::commit();
            }
            return $this->paymentDetail($id);
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
        }
    }

    public function checkCanCreateMedicalSessionForCadre($idCadre)
    {
        return $this->mainRepository->getList(
            [
                'id',
            ]
            ,
            [
                'cadre_id' => QueryHelper::setQueryInput($idCadre),
                'status' => QueryHelper::setQueryInput(
                    [
                        MedicalSessionConstants::STATUS_WAITING,
                        MedicalSessionConstants::STATUS_DOING,
                        MedicalSessionConstants::STATUS_WAITING_RESULT
                        ],
                    KEY_WHERE_IN
                ),
            ],
        )->count();
    }

    /**
     * Set reExaminationDate
     * @param $data
     * @return array
     */
    public function reExamination($data): array
    {
        try {
            $medicalSession = $this->mainRepository->find($data['id_medical_session']);
            $response = [
                'message' => __('label.medical_session.message.re_examination'),
                'statusSave' => 1 //1: Lưu bình thường
            ];
            if (!$data['re_examination_date']) {
                if ($medicalSession->re_examination_date) {
                    $response['message'] = __('label.medical_session.message.delete_re_examination');
                } else {
                    $response['statusSave'] = 0; //0: Khi có ngày hẹn khám xong xóa đi
                }
            }

            $medicalSession->re_examination_date = $data['re_examination_date'] ?
                CommonHelper::formatDate($data['re_examination_date'], DAY_MONTH_YEAR, YEAR_MONTH_DAY) : null;
            $medicalSession->save();
            $response['result'] = true;
            return $response;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $response['result'] = false;
            return $response;
        }
    }

}
