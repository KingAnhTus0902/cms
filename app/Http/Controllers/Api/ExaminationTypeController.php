<?php

namespace App\Http\Controllers\Api;

use App\Services\ExaminationTypeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ExaminationTypeRequest;

class ExaminationTypeController extends BaseController
{
    /** @var ExaminationTypeService */
    protected ExaminationTypeService $examinationTypeService;

    /**
     * Base constructor
     *
     * @param ExaminationTypeService $examinationTypeService
     */
    public function __construct(ExaminationTypeService $examinationTypeService)
    {
        $this->examinationTypeService = $examinationTypeService;
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
                'keyword',
            ),
            [INPUT_PAGE => $request->get(INPUT_PAGE) ?? PAGE_DEFAULT]
        );

        $response = $this->examinationTypeService->list($param);

        return response()->json([
            'success' => true,
            'html' => view('elements.examination_type.list', $response)->render()
        ]);
    }

    /**
     * Admin register new disease
     *
     * @param ExaminationTypeRequest $request
     * @return JsonResponse
     */
    public function store(ExaminationTypeRequest $request): JsonResponse
    {
        $param = $request->only('name', 'insurance_unit_price', 'service_unit_price');

        return $this->examinationTypeService->store($param)
            ? response()->json(['success' => __('messages.SM-001')])
            : response()->json(['error' => __('messages.EM-000')], 500);
    }

    /**
     * Display edit of disease
     *
     * @param $id
     * @return JsonResponse
     */
    public function edit($id): JsonResponse
    {
        $examinationTypes = $this->examinationTypeService->edit($id);

        return response()->json([
            'success' => true,
            'data' => $examinationTypes
        ]);
    }

    /**
     * Admin update disease
     *
     * @param ExaminationTypeRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(ExaminationTypeRequest $request, $id): JsonResponse
    {
        $examinationTypeRequest = array_merge(
            $request->only(
                'name',
                'insurance_unit_price',
                'service_unit_price'
            ),
            ['id' => $id]
        );
        $result = $this->examinationTypeService->update($examinationTypeRequest);

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
        $result = $this->examinationTypeService->delete($id);

        return isset($result)
            ? response()->json(['success' => __('messages.SM-003')])
            : response()->json(['error' => __('messages.EM-000')], 500);
    }
}
