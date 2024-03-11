<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\PermissionRequest;
use App\Models\Role;
use App\Services\Permission\PermissionServiceInterface;
use App\Services\Role\RoleServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
     * Display list permission/role
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function list(Request $request): JsonResponse
    {
        $param = array_merge(
            $request->only(
                'name',
                'type'
            ),
            [INPUT_PAGE => $request->get(INPUT_PAGE) ?? PAGE_DEFAULT]
        );

        $response = $this->permissionService->list($param);

        return response()->json([
            'success' => true,
            'html' => view('elements.permission.list', $response)->render()
        ]);
    }

    /**
     * Register permission/role
     *
     * @param PermissionRequest $request
     * @return JsonResponse
     */
    public function store(PermissionRequest $request): JsonResponse
    {
        $param = array_merge(
            $request->only(
                'name',
                'type'
            ),
            ['guard_name' => Role::GUARD_WEB]
        );

        return $this->permissionService->store($param)
            ? response()->json(['success' => __('messages.SM-001')])
            : response()->json(['error' => __('messages.EM-000')], 500);
    }

    /**
     * Display edit of permission/role
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function edit(Request $request, $id): JsonResponse
    {
        $permission = $this->permissionService->edit($id, $request['type']);

        return response()->json([
            'success' => true,
            'data' => $permission
        ]);
    }

    /**
     * Update permission/role
     *
     * @param PermissionRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(PermissionRequest $request, $id): JsonResponse
    {
        $permissionRequest = $request->only(
            'name',
            'type'
        );

        $result = $this->permissionService->update($permissionRequest, $id);

        return isset($result)
            ? response()->json(['success' => __('messages.SM-002')])
            : response()->json(['error' => __('messages.EM-000')], 500);
    }

    /**
     * Delete permission/role
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function destroy(Request $request, $id): JsonResponse
    {
        $result = $this->permissionService->delete($id, $request['type']);

        return isset($result)
            ? response()->json(['success' => __('messages.SM-003')])
            : response()->json(['error' => __('messages.EM-000')], 500);
    }

    /**
     * Set permission relate to roles
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function setPermission(Request $request, $id): JsonResponse
    {
        $permissions = $this->permissionService->setPermission($request, $id);

        return isset($permissions)
            ? response()->json(['success' => __('messages.SM-002')])
            : response()->json(['error' => __('messages.EM-000')], 500);
    }
}
