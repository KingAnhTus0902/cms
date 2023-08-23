<?php

namespace App\Http\Controllers\Mobile;

use App\Constants\MedicalSessionConstants;
use App\Constants\MedicalSessionRoomConstants;
use App\Repositories\DesignatedServiceOfMedicalSession\DSMedSessionRepositoryInterface;
use App\Repositories\MedicalSession\MedicalSessionRepositoryInterface;
use App\Repositories\User\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MedicalSessionsController extends BaseController
{
    protected $medicalSessionRepository;
    protected $designatedServiceRepository;
    protected $userRepository;

    public function __construct(
        MedicalSessionRepositoryInterface $medicalSessionRepository,
        DSMedSessionRepositoryInterface $designatedServiceRepository,
        UserRepository $userRepository
    ) {
        $this->medicalSessionRepository = $medicalSessionRepository;
        $this->designatedServiceRepository = $designatedServiceRepository;
        $this->userRepository = $userRepository;
    }

    public function list(Request $request)
    {
        try {
            $id = auth()->guard('mobile')->id();
            $respose = [];
            $getListMedicalSession = $this->medicalSessionRepository->getlistByIdForeignKey(
                MedicalSessionConstants::COLUMN_CADRE_ID,
                $id
            );
            foreach ($getListMedicalSession as $medicalSession) {
                $medicalSessionRoom = $this->medicalSessionRepository->getMeidcalsessionRoom(
                    MedicalSessionRoomConstants::COLUMN_MEDICAL_SESSION_ID,
                    $medicalSession->id
                );
                $user = null;
                if ($medicalSessionRoom) {
                    $idUser = $medicalSessionRoom->user_id;
                    $user = $this->userRepository->getDetailApi($idUser);
                }
                $department = $medicalSession->getDepartmentApi($medicalSession->getRawOriginal('department_id'));
                $data = [
                    'id' => $medicalSession->id,
                    'medical_examination_day' => $medicalSession->medical_examination_day,
                    'medical_examination_day_end' => $medicalSession->medical_examination_day,
                    'code' => $medicalSession->code,
                    'name_user' => $medicalSession->cadre_name ?? '',
                    'department' =>  $department->count() ? $department[0]->name :'',
                    'status_name' => $medicalSession->getStatusAttributeApi(
                        $medicalSession->getRawOriginal(MedicalSessionConstants::COLUMN_STATUS)
                    ),
                    're_examination_date' => $medicalSessionre_examination_date ?? ''
                ];
                $respose[] = $data;
            }
            return $this->response(
                Response::HTTP_OK,
                '',
                $respose
            );
        } catch (\Exception | \Error $e) {
            report($e);

            return $this->response(
                Response::HTTP_BAD_REQUEST,
            );
        }
    }

    public function detail($id)
    {
        try {
            $data = [];
            $array = [];
            $dataDesignatedService = [];
            $dataMedicalSessionRoom = [];
            $dataDiseaseOfMedicalSession = [];
            $dataMedicineOfMedicalSessions = [];
            $birthday = '';
            $now = Carbon::now()->year;
            $getMedicalSession = $this->medicalSessionRepository->findTrashed($id);
            if ($getMedicalSession->cadre_birthday) {
                $birthday = date('Y', strtotime($getMedicalSession->cadre_birthday));
            }
            $data['detail_medical_history'] = [];
            if ($getMedicalSession){
                $getListDesignatedServiceOfMedicalSession = $getMedicalSession
                    ? $getMedicalSession->getDSOfMedicalSession
                    : [];
                $getListDiseaseOfMedicalSession = $getMedicalSession
                    ? $getMedicalSession->getDiseaseOfMedicalSession
                    : [];
                $getListMedicalSessionRoom = $getMedicalSession ? $getMedicalSession->medicalSessionRoom : [];
                $prescription = $getMedicalSession ? $getMedicalSession->prescription : [];
                $medicineOfMedicalSessions = $prescription ? $prescription->medicinesDispensed : [];

                foreach ($medicineOfMedicalSessions as $medicineOfMedicalSession) {
                    $array = [
                        'id' => $medicineOfMedicalSession->id,
                        'materials_name' => $medicineOfMedicalSession->materials_name,
                        'materials_amount' => $medicineOfMedicalSession->materials_amount,
                        'materials_unit' => $medicineOfMedicalSession->materials_unit,
                        'materials_unit_price' => $medicineOfMedicalSession->materials_unit_price,
                        'materials_insurance_unit_price' => $medicineOfMedicalSession->materials_insurance_unit_price,
                        'materials_usage' => $medicineOfMedicalSession->materials_usage
                    ];
                    $dataMedicineOfMedicalSessions[] = $array;
                }
                foreach ($getListMedicalSessionRoom as $medicalSessionRoom) {
                    $array = [
                        'id' => $medicalSessionRoom->room_id ?? '',
                        'room_name' => $medicalSessionRoom->room_name,
                        'user_name_room' => $medicalSessionRoom->user_name ?? '',
                        'examination_name' => $medicalSessionRoom->examination_name ?? '',
                        'examination_insurance_price' => $medicalSessionRoom->examination_insurance_price ?? '',
                        'examination_service_price' => $medicalSessionRoom->examination_service_price ?? '',
                    ];
                    $dataMedicalSessionRoom[] = $array;
                }
                foreach ($getListDiseaseOfMedicalSession as $diseaseOfMedicalSession) {
                    $array = [
                        'id' => $diseaseOfMedicalSession->id,
                        'name' => $diseaseOfMedicalSession->disease_name,
                    ];
                    $dataDiseaseOfMedicalSession[] = $array;
                }
                foreach ($getListDesignatedServiceOfMedicalSession as $designatedService) {
                    $array = [
                        'id' => $designatedService->id,
                        'designated_service_name' => $designatedService->designated_service_name,
                        'designated_service_unit_price' => $designatedService->designated_service_unit_price,
                        'designated_service_insurance_unit_price' => $designatedService->designated_insurance_unit_price,
                        'designated_service_amount' => $designatedService->designated_service_amount,
                    ];
                    $dataDesignatedService[] = $array;
                }
                $date = $getMedicalSession ? Carbon::parse($getMedicalSession->getRawOriginal('medical_examination_day')) : '';
                $getDepartment = $getMedicalSession ? $getMedicalSession->getDepartmentApi($getMedicalSession->getRawOriginal('department_id')) : '';
                $data['detail_medical_history'] = [
                    'department_name' => $getMedicalSession ? ($getDepartment->count() ? $getDepartment[0]->name : '') : '',
                    'code_HS' => $getMedicalSession ? $getMedicalSession->code : '',
                    'treatment_method' => $getMedicalSession ? $getMedicalSession->diagnose : '',
                    'conclude' => $getMedicalSession ? $getMedicalSession->conclude : '',
                    'medical_examination_day' => $date ? $date->format('h:i:s d/m/Y') : '',
                    're_examination_date' => $getMedicalSession ? $getMedicalSession->re_examination_date : '27/07/2023',

                ];
                $data['detail_medical_history']['cadre'] = [
                    'name' => $getMedicalSession->cadre_name ?? '',
                    'gender' => $getMedicalSession->cadre_gender ?? '',
                    'age' => $birthday ? ($now - $birthday) : '',
                    'address' => $getMedicalSession->cadre_address ?? '',
                    'medical_insurance_number' => $getMedicalSession->cadre_medical_insurance_number ?? '',
                    'medical_insurance_address'=> $getMedicalSession->cadre_medical_insurance_address ?? '',
                ];
                $data['detail_medical_history']['total'] = [
                    'payment_price' => $getMedicalSession ? $getMedicalSession-> payment_price: '',
                    'health_insurance_fund' => $getMedicalSession ? $getMedicalSession-> health_insurance_fund: '',
                    'patient_pay' => $getMedicalSession ? $getMedicalSession-> patient_pay: '',
                    'other_sources' => 0,
                    'other_payables' => 0
                ];
                $data['detail_medical_history']['diseases_of_medical_sessions'] = $dataDiseaseOfMedicalSession;
                $data['detail_medical_history']['medical_session_rooms'] = $dataMedicalSessionRoom;
                $data['detail_medical_history']['designated_service_of_medical_sessions'] = $dataDesignatedService;
                $data['detail_medical_history']['medicine_of_medical_sessions'] = $dataMedicineOfMedicalSessions;
            }


            return $this->response(
                    Response::HTTP_OK,
                    '',
                    $data
                );
        } catch (\Exception | \TypeError $e) {
            report($e);

            return $this->response(
                Response::HTTP_BAD_REQUEST,
            );
        }

    }
}
