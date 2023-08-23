<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Services\DepartmentService;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $departmentService;

    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }

    /**
     * List Department
     * @param Request $request
     */
    public function list(Request $request)
    {
        $response = $this->departmentService->list($request->get('data'), true);
        return view('elements.department.search-result', $response)->render();
    }

    /**
     * create department
     * @param DepartmentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(DepartmentRequest $request)
    {
        $data = $request->all();
        try {
            $response['data'] = $this->departmentService->create($data);
            return $this->createSuccessResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }

    /**
     * update department
     * @param DepartmentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function detail($id)
    {
        $response['data'] = $this->departmentService->findOneOrFail($id);
        return $this->successResponse($response);
    }

    /**
     * update department
     * @param DepartmentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(DepartmentRequest $request)
    {
        $data = $request->all();
        try {
            $id = $data['id'];
            $department = $this->departmentService->findOneOrFail($id);
            $response['data'] = $department->update($data);
            return $this->updateSuccessResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }


    /**
     * delete department
     * @param DepartmentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        try {
            $id = $request->input('id');
            $department = $this->departmentService->findOneOrFail($id);
            if ($department->rooms->count()) {
                return $this->errorForbiddenResponse(__('label.department.messages.can_not_delete'));    
            }
            $response['data'] = $department->delete();
            
            return $this->deleteSuccessResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }

    public function listDepartment(Request $request)
    {
        $departmentId = $request->data['department_id'] ?? '';
        try {
            $departments = $this->departmentService->all();
            $view = '<option value="">--- Chọn khoa ---</option>';
            foreach ($departments as $department) {
                if ($departmentId !== '' && $department->id == $departmentId) {
                    $view.= '<option value="'. $department->id. '" selected>'. $department->name. '</option>';
                } else {
                    $view.= '<option value="'. $department->id. '">'. $department->name. '</option>';
                }
            }
            return $view;
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }
}
