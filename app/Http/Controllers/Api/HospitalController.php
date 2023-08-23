<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\HospitalRequest;
use App\Services\HospitalService;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    protected $hospitalService;

    public function __construct(HospitalService $hospitalService)
    {
        $this->hospitalService = $hospitalService;
    }


    /**
     * List Hospitals
     * @param Request $request
     */
    public function list(Request $request)
    {
        $response = $this->hospitalService->list($request->get('data'), true);
        return view('elements.hospital.table', $response)->render();
    }

    /**
     * create hospital
     * @param HospitalRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(HospitalRequest $request)
    {
        $data = $request->all();
        try {
            $response['data'] = $this->hospitalService->create($data);
            $response['message'] = __('messages.SM-001');
            return $this->successResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }

    /**
     * update hospital
     * @param HospitalRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function detail($id)
    {
        $response['data'] = $this->hospitalService->findOneOrFail($id);
        return $this->successResponse($response);
    }

    /**
     * update hospital
     * @param HospitalRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(HospitalRequest $request)
    {
        $data = $request->all();
        try {
            $id = $data['id'];
            $hospital = $this->hospitalService->findOneOrFail($id);
            $response['data'] = $hospital->update($data);
            $response['message'] = __('messages.SM-002');
            return $this->successResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }


    /**
     * delete hospital
     * @param HospitalRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        try {
            $id = $request->input('id');
            $hospital = $this->hospitalService->findOneOrFail($id);
            $response['data'] = $hospital->delete();
            return $this->deleteSuccessResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }

    /**
     * searchHospitalByCode
     *
     * @param Request $request
     *
     * @return [type]
     */
    public function searchHospitalByCode(Request $request)
    {
        $response = $this->hospitalService->getHospitalSuggest($request->only('hospital_code'));
        return response()->json($response);
    }
}
