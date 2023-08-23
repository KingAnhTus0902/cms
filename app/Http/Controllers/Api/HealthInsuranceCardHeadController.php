<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\HealthInsuranceCardHeadRequest;
use App\Services\HealthInsuranceCardHeadService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HealthInsuranceCardHeadController extends Controller
{
    protected $healthInsuranceCardHeadService;

    /**
     * Constructor
     * Before
     * @param HealthInsuranceCardHeadService $healthInsuranceCardHeadService
     */
    public function __construct(HealthInsuranceCardHeadService $healthInsuranceCardHeadService)
    {
        $this->healthInsuranceCardHeadService = $healthInsuranceCardHeadService;
    }

    /**
     * List HealthInsuranceCard Render Data
     * @param Request $request
     */
    public function list(Request $request)
    {
        $healthInsuranceCardData = $this->healthInsuranceCardHeadService->list($request->get('data'));
        return view('elements.health_insurance_card.search-result', $healthInsuranceCardData)->render();
    }

    /**
     * Create HealthInsuranceCard
     * @param HealthInsuranceCardHeadRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(HealthInsuranceCardHeadRequest $request)
    {
        try {
            $response['data'] = $this->healthInsuranceCardHeadService->saveHealthInsuranceCardHead(
                $request->only(
                    'code',
                    'discount_right_line',
                    'discount_opposite_line',
                ),
                null
            );
            return $this->createSuccessResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }

    /**
     * detail detailHealthInsuranceCardHead
     * @param mixed $id
     *
     * @return JsonResponse $result
     */
    public function detail($id)
    {
        $response['data'] = $this->healthInsuranceCardHeadService->detailHealthInsuranceCardHead($id);
        return $this->successResponse($response);
    }

    /**
     * Update HealthInsuranceCard
     * @param HealthInsuranceCardHeadRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(HealthInsuranceCardHeadRequest $request)
    {
        try {
            $response['data'] = $this->healthInsuranceCardHeadService->saveHealthInsuranceCardHead(
                $request->only(
                    'code',
                    'discount_right_line',
                    'discount_opposite_line',
                ),
                $request->id
            );
            if ($response['data'] === Response::HTTP_NOT_FOUND) {
                return $this->notFoundErrorResponse();
            }
            return $this->updateSuccessResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }

    /**
     * delete HealthInsuranceCard
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        try {
            $response['data'] = $this->healthInsuranceCardHeadService->deleteHealthInsuranceCardHead($request->id);
            if ($response['data'] === Response::HTTP_NOT_FOUND) {
                return $this->notFoundErrorResponse();
            }
            return $this->deleteSuccessResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }
}
