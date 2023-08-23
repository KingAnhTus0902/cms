<?php

namespace App\Http\Controllers\Api;

use App\Constants\MedicalSessionConstants;
use App\Constants\PrescriptionConstants;
use App\Helpers\CommonHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\MedicalSessionCadresRequest;
use App\Http\Requests\MedicalSessionRequest;
use App\Http\Requests\ReExaminationRequest;
use App\Http\Requests\SaveMedicalSessionRequest;
use App\Http\Requests\WaitingResultRequest;
use App\Constants\MedicalSessionRoomConstants;
use App\Services\MedicalSessionRoomService;
use App\Services\CadresService;
use App\Services\MedicalSession\MedicalSessionServiceInterface;
use App\Services\MedicalSessionService;
use App\Services\Mail\MailServiceInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MedicalSessionController extends Controller
{
    protected $medicalSessionService;
    protected $cadresService;

    /** @var MedicalSessionServiceInterface */
    protected MedicalSessionServiceInterface $medicalSessionServices;
    /** @var MedicalSessionRoomService */
    protected MedicalSessionRoomService $medicalSessionRoomService;
      /** @var MailServiceInterface */
      protected MailServiceInterface $mailService;

    public function __construct(
        MedicalSessionService $medicalSessionService,
        CadresService $cadresService,
        MedicalSessionServiceInterface $medicalSessionServices,
        MedicalSessionRoomService $medicalSessionRoomService,
        MailServiceInterface $mailService
    )
    {
        $this->medicalSessionService = $medicalSessionService;
        $this->cadresService = $cadresService;
        $this->medicalSessionServices = $medicalSessionServices;
        $this->medicalSessionRoomService = $medicalSessionRoomService;
        $this->mailService = $mailService;
    }

    /**
     * create Cadres
     * @return \Illuminate\Http\JsonResponse
     */
    public function createCadres(MedicalSessionCadresRequest $request)
    {
        $data = $request->all();
        $data = CommonHelper::setDataMedicalInsuranceAndDate($data);
        try {
            if (!$data['cadre_id_check']) {
                $password = Str::random(10);
                $data['password'] = Hash::make($password);
                $data['code'] = 'CB';
                $data['status'] = ACTIVE;
                $res = $this->cadresService->create($data);
                $code = str_pad($res->id, 4, "0", STR_PAD_LEFT);
                $response['data'] = $res->update(['code' => 'CB' . $code]);
                $response['id'] = $res->id;
                if ($data['email']) {
                    $mailParams = [
                        'to' => $data['email'],
                        'subject' => __('label.email.subject'),
                        'html_content' => 'emails.cadre-register',
                        'data' => [
                            'name' => $data['name'],
                            'user_name' => $data['email'],
                            'password' => $password,
                            'android_link' => env(
                                'ANDROID_LINK',
                                'https://play.google.com/store/apps/details?id=com.jvb.medbook'
                            ),
                            'ios_link' => 'Medbook'
                        ]
                    ];
                    // Send mail
                    $this->mailService->send($this->mailService->init($mailParams));
                }

                return $this->createSuccessResponse($response);
            } else {
                $cadre = $this->cadresService->find($data['cadre_id_check']);
                $response['data'] = $cadre->update($data);
                $response['id'] = $cadre->id;
                return $this->updateSuccessResponse($response);
            }
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }

    /**
     * update Cadres
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateCadres(MedicalSessionCadresRequest $request)
    {
        $data = $request->all();
        $data = CommonHelper::setDataMedicalInsuranceAndDate($data);
        $response = $this->medicalSessionService->updateCadreAndMedicalSession($data);
        if ($response === true) {
            return $this->updateSuccessResponse([]);
        }
        return $this->badRequestErrorResponse($response);
    }

    public function searchCadresByName(Request $request)
    {

        $keyword = $request->input('query');
        $cadres = $this->cadresService->getCadresSuggest($keyword);
        return response()->json($cadres);
    }

    public function create(MedicalSessionRequest $request)
    {
        $cadreId = $request->cadre_id;
        $medicalSessionOld = $this->medicalSessionService->checkCanCreateMedicalSessionForCadre($cadreId);
        if ($medicalSessionOld > 0) {
            return $this->errorForbiddenResponse(__('label.medical_session.message.not_create'));
        }
        $cadre = $this->cadresService->findOneOrFail($cadreId);
        $data = $request->all();
        $data['use_medical_insurance'] = $cadre->medical_insurance_number
            ? MedicalSessionConstants::USE_MEDICAL_INSURANCE
            : MedicalSessionConstants::NO_USE_MEDICAL_INSURANCE;
        $response = $this->medicalSessionService->createMedicalSession($data, $cadre);
        if ($response === true) {
            return $this->createSuccessResponse([]);
        }
        return $this->badRequestErrorResponse($response);
    }

    public function update(MedicalSessionRequest $request)
    {
        $response = $this->medicalSessionService->update($request->all());
        if ($response === true) {
            return $this->updateSuccessResponse([]);
        }
        return $this->badRequestErrorResponse($response);
    }

    public function detail($id)
    {
        $response['data'] = $this->medicalSessionService->detail($id);
        return $this->successResponse($response);
    }

    /**
     * Update diagnose for medical session
     *
     * @param Request $request
     * @param
     * @return ?Model
     */
    public function diagnose(Request $request, $id): ?Model
    {
        $param = [
            'diagnose' => $request['data']
        ];
        return $this->medicalSessionServices->update($param, $id);
    }

    /**
     * Update conclude for medical session
     *
     * @param Request $request
     * @param
     * @return ?Model
     */
    public function conclude(Request $request, $id): ?Model
    {
        $param = [
            'conclude' => $request['data']
        ];
        return $this->medicalSessionServices->update($param, $id);
    }

    public function changeRoom(Request $request)
    {
        $response = $this->medicalSessionService->changeRoom($request);
        if ($response === true) {
            $data['id_room'] = $request['id_room'];
            return $this->successResponse($data);
        }
        return $this->badRequestErrorResponse($response);
    }
    public function cancel(Request $request)
    {
        try {
            $id = $request->input('id');
            $medical = $this->medicalSessionService->findOneOrFail($id);
            $check = $this->medicalSessionService->checkStatusFinishAndProcessingDSOfMedicalSession($medical);
            if ($check !== 0) {
                return $this->errorForbiddenResponse(__('messages.M-003'));
            }
            $checkCancel = $this->medicalSessionService->checkStatusWatingDSOfMedicalSession($medical);
            if ($checkCancel !== 0) {
                return $this->errorForbiddenResponse(__('messages.M-005'));
            }
            $prescription = $medical->prescription;
            if (isset($prescription) && $prescription['status'] === PrescriptionConstants::STATUS_DISPENSED) {
                return $this->errorForbiddenResponse(__('messages.M-006'));
            }
            $response['id'] = $id;
            return $this->updateSuccessResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }
    public function complete(SaveMedicalSessionRequest $request)
    {
        try {
            $id = $request->input('id');
            $medical = $this->medicalSessionService->findOneOrFail($id);
            $check = $this->medicalSessionService->checkStatusWaitingAndProcessingDSOfMedicalSession($medical);
            if ($check !== 0) {
               return $this->errorForbiddenResponse(__('messages.M-002'));
            }
            $response['id'] = $id;
            return $this->updateSuccessResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }

    public function transfer(SaveMedicalSessionRequest $request)
    {
        try {
            $id = $request->input('id');
            $response = $this->medicalSessionService->findOneOrFail($id);
            $check = $this->medicalSessionService->checkStatusWaitingAndProcessingDSOfMedicalSession($response);
            if ($check !== 0) {
                return $this->errorForbiddenResponse(__('messages.M-004'));
            }
            $response['id'] = $id;
            return $this->updateSuccessResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }

    public function waitingResult(WaitingResultRequest $request)
    {
        try {
            $id = $request->input('id');
            $medical = $this->medicalSessionService->findOneOrFail($id);
            $response['data'] = $medical->update([
                'status' => MedicalSessionConstants::STATUS_WAITING_RESULT
            ]);
            return $this->updateSuccessResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }
    public function updateStatusComplete(Request $request)
    {
        try {
            $id = $request->input('id');
            $medical = $this->medicalSessionService->findOneOrFail($id);
            $this->medicalSessionRoomService->whereIn('medical_session_id', [$id])->update([
                'status_room' => MedicalSessionRoomConstants::STATUS_DONE
            ]);
            $response['data'] = $medical->update([
                'status' => MedicalSessionConstants::STATUS_DONE,
                'medical_examination_day_end' => Carbon::now()->toDateTimeString()
            ]);
            return $this->updateSuccessResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }
    public function updateStatusCancel(Request $request)
    {
        try {
            $id = $request->input('id');
            $medical = $this->medicalSessionService->findOneOrFail($id);
            $response['data'] = $medical->update(['status' => MedicalSessionConstants::STATUS_CANCEL]);
            return $this->updateSuccessResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }

    /**
     * Set reExaminationDate
     * @param ReExaminationRequest $request
     * @return JsonResponse
     */
    public function reExamination(ReExaminationRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->only('re_examination_date', 'id_medical_session');
        $response = $this->medicalSessionService->reExamination($data);
        if ($response['result'] === true) {
            return $this->successResponse($response);
        }
        return $this->badRequestErrorResponse($response);
    }
}
