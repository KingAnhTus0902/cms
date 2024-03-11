<?php

namespace App\Http\Controllers\Api;

use App\Constants\MedicalSessionRoomConstants;
use App\Http\Controllers\Controller;
use App\Repositories\MedicalSessionRooms\MedicalSessionRoomRepositoryInterface;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ExaminationRequest;
use App\Services\MedicalSessionService;
use App\Services\VitalSignService;
use Illuminate\Support\Facades\DB;

class ExaminationController extends Controller
{
    /**
     * @var medicalSessionService
     */
    protected $medicalSessionService;

    /**
     * @var vitalSignService
     */
    protected $vitalSignService;
    /**
     * @var MedicalSessionRoomRepositoryInterface
     */
    protected $medicalSessionRoom;

    /**
     * ExaminationController constructor.
     * @param MedicalSessionService $medicalSessionService
     * @param VitalSignService $vitalSignService
     * @param MedicalSessionRoomRepositoryInterface $medicalSessionRoom
     */
    public function __construct(
        MedicalSessionService $medicalSessionService,
        VitalSignService $vitalSignService,
        MedicalSessionRoomRepositoryInterface $medicalSessionRoom
    ) {
        $this->medicalSessionService    = $medicalSessionService;
        $this->vitalSignService         = $vitalSignService;
        $this->medicalSessionRoom       = $medicalSessionRoom;
    }

    /**
     * @param integer $medical_session_id
     * @param ExaminationRequest $request
     * @return JsonResponse
     */
    public function createOrUpdate(int $medical_session_id, ExaminationRequest $request): JsonResponse
    {
        $data = $request->all();
        DB::beginTransaction();
        try {
            $medical_session = $this->medicalSessionService->findOneOrFail($medical_session_id);
            $medicalSessionRoomId = $medical_session->medicalSessionRoom->last()->id;
            if (isset($data['status'])) {
                $response['medical_session'] = $medical_session
                    ->update(['status' => $data['status']]);
                $response['medical_session_room'] = $this->medicalSessionRoom->update($medicalSessionRoomId,[
                    'status_room' => MedicalSessionRoomConstants::STATUS_DOING,
                    'user_id'     => $this->medicalSessionService->getLoginUserId()
                ]);
                $response['message'] = __('messages.SM-002');
                $response['type']    = UPDATE;
            } else {
                $response['vital_sign'] = $this->vitalSignService->createOrUpdate($medical_session_id, $data);
                $response['message'] = $response['vital_sign']['type'] === CREATE ?
                    __('messages.SM-001') :
                    __('messages.SM-002');
            }
            DB::commit();
            return $this->successResponse($response);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->badRequestErrorResponse($e);
        }
    }
}
