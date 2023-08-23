<?php

namespace App\Http\Controllers\Cms;

use App\Helpers\RoleHelper;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Services\DepartmentService;
use App\Services\ExaminationTypeService;
use App\Services\RoomService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    protected $roomService;
    protected $departmentService;
    protected $examinationTypeService;

    public function __construct(
        RoomService $roomService,
        ExaminationTypeService $examinationTypeService,
        DepartmentService $departmentService
    )
    {
        $this->roomService = $roomService;
        $this->examinationTypeService = $examinationTypeService;
        $this->departmentService = $departmentService;
    }

    public function index()
    {
        $examinationTypeServices = $this->examinationTypeService->all();
        $departments = $this->departmentService->all();
        $departmentsToCreateRoom = $departments;
        if (!RoleHelper::getByRole([ADMIN])) {
            $departmentsToCreateRoom = $this->departmentService->findBy(['user_head_id' => Auth::user()->id]);
        }
        return view('room.index', compact('departments', 'examinationTypeServices', 'departmentsToCreateRoom'));
    }

    /**
     * List Department
     * @param Request $request
     * @return string
     */
    public function list(Request $request)
    {
        $response = $this->roomService->list($request->get('data'), true);
        $roomCanDelete = [];
        if (!RoleHelper::getByRole([ADMIN])) {
            $departmentOfUser = $this->departmentService->findBy(['user_head_id' => Auth::user()->id]);
            $roomCanDelete = $this->roomService->findByAttrInArray('department_id', $departmentOfUser->pluck('id'));
            $roomCanDelete = $roomCanDelete->pluck('id')->toArray();
        }
        $response['roomCanDelete'] = $roomCanDelete;
        return view('elements.room.search-result', $response)->render();
    }
}
