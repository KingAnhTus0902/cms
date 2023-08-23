<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\DesignatedServiceOfMedicalSessionRequest;
use App\Http\Requests\DSMedicalSessionStatusRequest;
use App\Services\DesignatedServiceOfMedicalSession\DSMedSessionServiceInterface;
use App\Services\MedicalSessionService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DesignatedServiceOfMedicalSessionController extends BaseController
{
    /** @var DSMedSessionServiceInterface */
    protected DSMedSessionServiceInterface $dsMedSessionService;

    /** @var MedicalSessionService */
    protected MedicalSessionService $medicalSessionService;

    /**
     * Base constructor
     *
     * @param DSMedSessionServiceInterface $designatedServiceOfMedicalSession
     * @param MedicalSessionService $medicalSessionService
     */
    public function __construct(
        DSMedSessionServiceInterface $designatedServiceOfMedicalSession,
        MedicalSessionService $medicalSessionService
    ) {
        $this->dsMedSessionService = $designatedServiceOfMedicalSession;
        $this->medicalSessionService = $medicalSessionService;
    }

    /**
     * Display list designated service of medical session
     *
     * @param Request $request
     * @param null $id
     * @return JsonResponse
     */
    public function list(Request $request, $id = null): JsonResponse
    {
        $requests = $request->only(
            'specialist',
            'room_id',
            'status',
            'medical_examination_day',
        );

        session()->put('medical_test', $requests);

        $params = array_merge(
            $requests,
            [INPUT_PAGE => $request->get(INPUT_PAGE) ?? PAGE_DEFAULT],
            [KEY_LIMIT => $request->get(KEY_LIMIT) ?? DEFAULT_LIMIT_PAGE]
        );

        $response = $this->dsMedSessionService->list($params, $id);

        $view = isset($id)
            ? 'elements.designated_service_medical_session.list' // Dịch vụ chỉ định trong phiên khám
            : 'elements.medical_test.list'; // Dịch vụ chỉ định xét nghiệm

        return response()->json([
            'success' => true,
            'html' => view($view, $response)->render()
        ]);
    }

    /**
     * Display index designated service of medical session
     *
     * @param $id
     * @return JsonResponse
     */
    public function edit($id): JsonResponse
    {
        $response = $this->dsMedSessionService->edit($id);

        return response()->json([
            'success' => true,
            'data' => $response
        ]);
    }

    /**
     * Admin register new designated service of medical session
     *
     * @param DesignatedServiceOfMedicalSessionRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function store(DesignatedServiceOfMedicalSessionRequest $request, $id): JsonResponse
    {
        $param = array_merge(
            $request->only(
                'designated_service_id',
                'designated_service_amount',
                'description'
            ),
            ['creator_id' => auth()->user()->id]
        );

        return $this->dsMedSessionService->store($param, $id)
            ? response()->json(['success' => __('messages.SM-001')])
            : response()->json(['error' => __('messages.EM-000')], 500);
    }

    /**
     * Admin update designated service of medical session
     *
     * @param DesignatedServiceOfMedicalSessionRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(DesignatedServiceOfMedicalSessionRequest $request, $id): JsonResponse
    {
        $param = $request->only(
            'designated_service_id',
            'designated_service_amount',
            'description',
            'medical_test_result',
            'medical_test_conclude',
            'status',
            'executor_id'
        );

        $result = $this->dsMedSessionService->update($param, $id);

        return isset($result)
            ? response()->json(['success' => __('messages.SM-002')])
            : response()->json(['error' => __('messages.EM-000')], 500);
    }

    /**
     * Delete designated service of medical session
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $result = $this->dsMedSessionService->delete($id);

        return isset($result)
            ? response()->json(['success' => __('messages.SM-003')])
            : response()->json(['error' => __('messages.EM-000')], 500);
    }

    /**
     * Print designated service of medical session
     *
     * @param
     * @param null $designatedId
     * @return View
     */
    public function print($medicalSessionId, $designatedId = null): View
    {
        list($designatedServiceMedicalSession, $medicalSession) = $this->dsMedSessionService->print(
            $medicalSessionId,
            $designatedId
        );

        return view('prints.designed-service-medical-session', compact(
            'designatedServiceMedicalSession',
            'medicalSession'
        ));
    }

    /**
     * Print medical test for designated service medical session
     *
     * @param $id
     * @return View
     */
    public function printMedicalTest($id): View
    {
        $designatedServiceMedicalSession = $this->dsMedSessionService->view($id);

        return view('prints.medical_test', compact('designatedServiceMedicalSession'));
    }

    /**
     * Change status for designated service medical session
     *
     * @param DSMedicalSessionStatusRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function status(DSMedicalSessionStatusRequest $request, $id): JsonResponse
    {
        $param = $request->only('status');

        $result = $this->dsMedSessionService->update($param, $id);

        return isset($result)
            ? response()->json(['success' => __('messages.SM-002')])
            : response()->json(['error' => __('messages.EM-000')], 500);
    }

    /**
     * Upload file for editor in medical test
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function upload(Request $request, $id): JsonResponse
    {
        $param = $request->only('file', 'code');

        $result = $this->dsMedSessionService->upload($param, $id);

        return isset($result)
            ? response()->json([
                'success' => __('messages.SM-002'),
                'data' => $result
             ])
            : response()->json(['error' => __('messages.EM-000')], 500);
    }
}
