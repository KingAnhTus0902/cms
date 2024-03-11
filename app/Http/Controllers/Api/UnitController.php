<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UnitRequest;
use App\Services\UnitService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class UnitController extends Controller
{
    protected $unitService;

    /**
     * Constructor
     * Before
     * @param UnitService $unitService
     */
    public function __construct(UnitService $unitService)
    {
        $this->unitService = $unitService;
    }

    /**
     * List Unit
     * @param Request $request
     */
    public function list(Request $request)
    {
        $response = $this->unitService->list($request->get('data'), true);
        return view('elements.unit.search-result', $response)->render();
    }

    /**
     * create unit
     * @param UnitRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(UnitRequest $request)
    {
        try {
            $response['data'] = $this->unitService->saveUnit(
                $request->only(['code', 'name', 'note']),
                null
            );
            $response['message'] = __('messages.SM-001');
            return $this->successResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }

    /**
     * detail unit
     * @param mixed $id
     *
     * @return JsonResponse $result
     */
    public function detail($id)
    {
        $response['data'] = $this->unitService->detailUnit($id);
        return $this->successResponse($response);
    }

    /**
     * @param UnitRequest $request
     *
     * @return [type]
     */
    public function update(UnitRequest $request)
    {
        try {
            $response['data'] = $this->unitService->saveUnit(
                $request->only(['code', 'name', 'note']),
                $request->id ?? ''
            );
            if ($response['data'] == Response::HTTP_NOT_FOUND) {
                return $this->notFoundErrorResponse();
            }
            $response['message'] = __('messages.SM-002');
            return $this->successResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }

    /**
     * delete unit
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        try {
            $result = $this->unitService->deleteUnit($request->id ?? '');
            if ($result === Response::HTTP_NOT_FOUND) {
                return $this->notFoundErrorResponse();
            }
            $response['message'] = __('messages.SM-003');
            return $this->successResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }
}
