<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Services\DepartmentService;
use App\Services\User\UserService;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $departmentService;
    protected $userService;

    public function __construct(
        DepartmentService $departmentService,
        UserService $userService
    )
    {
        $this->departmentService = $departmentService;
        $this->userService = $userService;
    }

    public function index()
    {
        $doctors = $this->userService->getListDoctor();
        return view('department.index', compact('doctors'));
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
}
