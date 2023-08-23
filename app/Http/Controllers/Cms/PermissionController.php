<?php

namespace App\Http\Controllers\Cms;

use App\Services\Permission\PermissionServiceInterface;
use App\Services\Role\RoleServiceInterface;
use Illuminate\Contracts\View\View;

class PermissionController extends BaseController
{
    /** @var PermissionServiceInterface */
    protected PermissionServiceInterface $permissionService;

    /** @var RoleServiceInterface */
    protected RoleServiceInterface $roleService;

    /**
     * Base constructor
     *
     * @param PermissionServiceInterface $permissionService
     * @param RoleServiceInterface $roleService
     */
    public function __construct(
        PermissionServiceInterface $permissionService,
        RoleServiceInterface $roleService
    ) {
        $this->roleService = $roleService;
        $this->permissionService = $permissionService;
    }

    /**
     * Display list permission
     *
     * @return View
     */
    public function index(): View
    {
        return view('permission.index');
    }

    /**
     * Display permission relate with roles
     *
     * @return View
     */
    public function getPermission(): View
    {
        $roles = $this->roleService->index(false);
        $permissions = $this->permissionService->getPermission();

        return view('permission.get_permission', compact('roles', 'permissions'));
    }
}
