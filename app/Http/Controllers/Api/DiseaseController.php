<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\DiseaseRequest;
use App\Services\Disease\DiseaseServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DiseaseController extends BaseController
{
    /** @var DiseaseServiceInterface */
    protected DiseaseServiceInterface $diseaseService;

    /**
     * Base constructor
     *
     * @param DiseaseServiceInterface $diseaseService
     */
    public function __construct(DiseaseServiceInterface $diseaseService)
    {
        $this->diseaseService = $diseaseService;
    }

    /**
     * Display list disease
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function list(Request $request): JsonResponse
    {
        $param = array_merge(
            $request->only(
                'name',
                'code',
                'type'
            ),
            [INPUT_PAGE => $request->get(INPUT_PAGE) ?? PAGE_DEFAULT]
        );

        $response = $this->diseaseService->list($param);

        return response()->json([
            'success' => true,
            'html' => view('elements.disease.list', $response)->render()
        ]);
    }

    /**
     * Display edit of disease
     *
     * @param $id
     * @return JsonResponse
     */
    public function edit($id): JsonResponse
    {
        $disease = $this->diseaseService->edit($id);

        return response()->json([
            'success' => true,
            'data' => $disease
        ]);
    }

    /**
     * Admin register new disease
     *
     * @param DiseaseRequest $request
     * @return JsonResponse
     */
    public function store(DiseaseRequest $request): JsonResponse
    {
        $param = array_merge($request->only('name', 'code', 'type'), ['status' => ACTIVE]);

        return $this->diseaseService->store($param)
            ? response()->json(['success' => __('messages.SM-001')])
            : response()->json(['error' => __('messages.EM-000')], 500);
    }

    /**
     * Admin update disease
     *
     * @param DiseaseRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(DiseaseRequest $request, $id): JsonResponse
    {
        $diseaseRequest = $request->only('name', 'code', 'type');
        $result = $this->diseaseService->update($diseaseRequest, $id);

        return isset($result)
            ? response()->json(['success' => __('messages.SM-002')])
            : response()->json(['error' => __('messages.EM-000')], 500);
    }

    /**
     * Delete disease
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $result = $this->diseaseService->delete($id);

        return isset($result)
            ? response()->json(['success' => __('messages.SM-003')])
            : response()->json(['error' => __('messages.EM-000')], 500);
    }
}
