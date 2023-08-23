<?php

namespace App\Http\Controllers\Cms;

use App\Services\Role\RoleServiceInterface;
use App\Services\User\UserServiceInterface;
use Illuminate\Contracts\View\View;

class UserController extends BaseController
{
    /** @var UserServiceInterface */
    protected UserServiceInterface $userService;

    /** @var RoleServiceInterface */
    protected RoleServiceInterface $roleService;

    /**
     * Base constructor
     *
     * @param UserServiceInterface $userService
     * @param RoleServiceInterface $roleService
     */
    public function __construct(
        UserServiceInterface $userService,
        RoleServiceInterface $roleService
    ) {
        $this->userService = $userService;
        $this->roleService = $roleService;
    }

    /**
     * Display index user
     *
     * @return View
     */
    public function index(): View
    {
        $departments = $this->userService->index();
        $roles = $this->roleService->index();

        return view('user.index', compact('departments', 'roles'));
    }

    /**
     * Display information of login user
     *
     * @return View
     */
    public function view(): View
    {
        $user = $this->userService->view();

        return view('user.view', compact('user'));
    }
}

