<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\MaterialTypeRequest;
use App\Services\MaterialTypeService;


class MaterialTypeController extends Controller
{
    /**
     * @var materialTypeService
     */
    protected $materialTypeService;

    /**
     * @param MaterialTypeService $materialTypeService
     */
    public function __construct(MaterialTypeService $materialTypeService)
    {
        $this->materialTypeService = $materialTypeService;
    }

    
    /**
     * List material types Ajax Data
     * @param Request $request
     * @return void
     */
    public function listAjax(Request $request)
    {
        $response = $this->materialTypeService->list($request->get('data'), true);

        return view('elements.material_type.search-result', $response)->render();
    }

    /**
     * create material_type
     * @param MaterialTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(MaterialTypeRequest $request) : JsonResponse
    {
        $data = $request->all();
        try {
            $response['data'] = $this->materialTypeService->create($data);
            
            return $this->createSuccessResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }

    /**
     * update material_type
     * @param MaterialTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function detail($id) : JsonResponse
    {
        $response['data'] = $this->materialTypeService->findOneOrFail($id);

        return $this->successResponse($response);
    }

    /**
     * update material_type
     * @param MaterialTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(MaterialTypeRequest $request) : JsonResponse
    {
        $data = $request->all();
        try {
            $id = $data['id'];
            $materialType = $this->materialTypeService->findOneOrFail($id);
            $response['data'] = $materialType->update($data);
            
            return $this->updateSuccessResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }


    /**
     * delete material_type
     * @param MaterialTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request) : JsonResponse
    {
        try {
            $id = $request->input('id');
            $materialType = $this->materialTypeService->findOneOrFail($id);
            $response['data'] = $materialType->delete();

            return $this->deleteSuccessResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }
}
