<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BaseSearchRequest;
use App\Http\Requests\MaterialRequest;
use App\Services\MaterialService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MaterialController extends Controller
{
    protected $materialService;

    /**
     * Constructor
     * Before
     * @param MaterialService $materialService
     */
    public function __construct(MaterialService $materialService)
    {
        $this->materialService = $materialService;
    }

    /**
     * List Material Render Data
     * @param BaseSearchRequest $request
     */
    public function list(BaseSearchRequest $request)
    {
        $materialsData = $this->materialService->list($request->get('data'));
        return view('elements.material.search-result', $materialsData)->render();
    }

    /**
     * Create Material
     * @param MaterialRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(MaterialRequest $request)
    {
        try {
            $response['data'] = $this->materialService->saveMaterial(
                $request->only(
                    'name',
                    'mapping_name',
                    'type',
                    'active_ingredient_name',
                    'content',
                    'dosage_form',
                    'material_type_id',
                    'ingredients',
                    'unit_id',
                    'service_unit_price',
                    'use_insurance',
                    'insurance_code',
                    'insurance_unit_price',
                    'disease_type',
                    'method',
                    'usage',
                ),
                null
            );
            return $this->createSuccessResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }

    /**
     * detail Material
     * @param mixed $id
     *
     * @return JsonResponse $result
     */
    public function detail($id)
    {
        $response['data'] = $this->materialService->detailMaterial($id);
        return $this->successResponse($response);
    }

    /**
     * Detail amount Material
     *
     * @param int $id
     * @return JsonResponse
     */
    public function detailAmount($id)
    {
        $materialBatches = $this->materialService->findOneOrFail($id);
        return view('elements.material.detail-result', compact('materialBatches'))->render();
    }

    /**
     * Update Material
     * @param MaterialRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(MaterialRequest $request)
    {
        try {
            $response['data'] = $this->materialService->saveMaterial(
                $request->only(
                    'name',
                    'mapping_name',
                    'type',
                    'active_ingredient_name',
                    'content',
                    'dosage_form',
                    'material_type_id',
                    'ingredients',
                    'unit_id',
                    'service_unit_price',
                    'use_insurance',
                    'insurance_code',
                    'insurance_unit_price',
                    'disease_type',
                    'method',
                    'usage',
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
     * Delete Material
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        try {
            $data = $this->materialService->deleteMaterial($request->id);
            if ($data['isNotFound']) {
                return $this->notFoundErrorResponse();
            }
            if ($data['isDenyDelete']) {
                return $this->errorForbiddenResponse(__('messages.M-001'));
            }
            if (!$data['isDeleted']) {
                return $this->internalServerErrorResponse();
            }

            return $this->deleteSuccessResponse(['data' => $data['isDeleted']]);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }
}
