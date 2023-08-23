<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicineOfMedicalSessionRequest;
use App\Services\MaterialService;
use App\Services\MedicineOfMedicalSessionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\MedicalSessionService;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MedicineOfMedicalSessionController extends Controller
{
    protected $medicineOfMedicalSessionService;
    protected $materialService;
    protected $medicalSessionService;
    /**
     * Constructor
     * Before
     * @param MedicineOfMedicalSessionService $medicineOfMedicalSessionService
     * @param MaterialService $materialService
     * @param MedicalSessionService $medicalSessionService
     */
    public function __construct(
        MedicineOfMedicalSessionService $medicineOfMedicalSessionService,
        MaterialService $materialService,
        MedicalSessionService $medicalSessionService
    ) {
        $this->medicineOfMedicalSessionService = $medicineOfMedicalSessionService;
        $this->materialService = $materialService;
        $this->medicalSessionService = $medicalSessionService;
    }

    /**
     * List MedicineOfMedicalSession Render Data
     * @param Request $request
     */
    public function list(Request $request)
    {
        $requestData = $request->get('data');
        $medicalSessionId = $requestData['medical_session_id'];
        $medicalSessionStatusPayment = $this->medicalSessionService->find($requestData['medical_session_id'])->getRawOriginal('payment_status');
        $medicineOfMedicalSessions = $this->medicineOfMedicalSessionService->list($medicalSessionId);
        return view('elements.medicine_of_medical_session.list', compact(
            'medicineOfMedicalSessions',
            'medicalSessionId',
            'medicalSessionStatusPayment',
        ))->render();
    }

    /**
     * Create MedicineOfMedicalSession
     * @param MedicineOfMedicalSessionRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(MedicineOfMedicalSessionRequest $request)
    {
        $response['data'] = $this->medicineOfMedicalSessionService->saveMedicineOfMedicalSession(
            $request->only(
                'prescription_id',
                'materials_name',
                'materials_code',
                'materials_amount',
                'materials_unit',
                'materials_unit_price',
                'materials_insurance_unit_price',
                'materials_usage',
                'advice',
                'user_id',
                'payment_status',
                'material_id',
                'medical_session_id',
            ),
            null
        );

        if ($response['data'] === Response::HTTP_NOT_FOUND) {
            return $this->notFoundErrorResponse();
        } elseif ($response['data'] === __('messages.EXM-001')) {
            return $this->badRequestErrorResponse(null, __('messages.EXM-001'));
        }
        return $response['data'] ? $this->createSuccessResponse($response) : $this->internalServerErrorResponse();
    }

    /**
     * detail detailMedicineOfMedicalSession
     * @param mixed $id
     *
     * @return JsonResponse $result
     */
    public function detail($id)
    {
        $response['data'] = $this->medicineOfMedicalSessionService->detailMedicineOfMedicalSession($id);
        return $this->successResponse($response);
    }

    /**
     * Update MedicineOfMedicalSession
     * @param MedicineOfMedicalSessionRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(MedicineOfMedicalSessionRequest $request)
    {
        $response['data'] = $this->medicineOfMedicalSessionService->saveMedicineOfMedicalSession(
            $request->only(
                'prescription_id',
                'materials_name',
                'materials_code',
                'materials_amount',
                'materials_unit',
                'materials_unit_price',
                'materials_insurance_unit_price',
                'materials_usage',
                'advice',
                'user_id',
                'payment_status',
                'material_id',
                'medical_session_id',
            ),
            $request->id
        );
        if ($response['data'] === Response::HTTP_NOT_FOUND) {
            return $this->notFoundErrorResponse();
        } elseif ($response['data'] === __('messages.EXM-001')) {
            return $this->badRequestErrorResponse(null, __('messages.EXM-001'));
        }
        return $response['data'] ? $this->updateSuccessResponse($response) : $this->internalServerErrorResponse();
    }

    /**
     * delete MedicineOfMedicalSession
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        DB::beginTransaction();
        try {
            $response['data'] = $this->medicineOfMedicalSessionService->deleteMedicineOfMedicalSession($request->id);
            if ($response['data'] === Response::HTTP_NOT_FOUND) {
                return $this->notFoundErrorResponse();
            }
            DB::commit();
            return $this->deleteSuccessResponse($response);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->badRequestErrorResponse($e);
        }
    }

    public function searchMaterial(Request $request)
    {
        $keyword = $request->input('query');
        $forPrescription = false;
        if (!empty($request->forPrescription)) {
            $forPrescription = true;
        }
        $materialsData = $this->materialService->getMaterialSuggest($keyword, $forPrescription);
        return response()->json($materialsData);
    }

    /**
     * detail Material
     * @param mixed $id
     *
     * @return JsonResponse $result
     */
    public function detailMaterial($id)
    {
        $response['data'] = $this->materialService->detailMaterial($id);
        return $this->successResponse($response);
    }

    /**
     * Print Prescription
     *
     * @param mixed $medicalSessionId
     *
     * @return [type]
     */
    public function print($medicalSessionId)
    {
        $medicalSession = $this->medicalSessionService->findOneOrFail($medicalSessionId);
        $medicineOfMedicalSessions = $this->medicineOfMedicalSessionService->listMedicinPrint($medicalSessionId);
        return view('elements.medicine_of_medical_session.print-prescription', compact(
            'medicalSession',
            'medicineOfMedicalSessions'
        ));
    }
}
