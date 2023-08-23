<?php

namespace App\Http\Controllers\Api;

use App\Helpers\RoleHelper;
use App\Http\Requests\Mobile\ChangePasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\UserRequest;
use App\Services\Auth\AuthServiceInterface;
use App\Services\User\UserServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends BaseController
{
    /** @var UserServiceInterface */
    protected UserServiceInterface $userService;

    /** @var AuthServiceInterface */
    protected AuthServiceInterface $authService;

    /**
     * Base constructor
     *
     * @param UserServiceInterface $userService
     * @param AuthServiceInterface $authService
     */
    public function __construct(UserServiceInterface $userService, AuthServiceInterface $authService)
    {
        $this->userService = $userService;
        $this->authService = $authService;
    }

    /**
     * Display list user
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function list(Request $request): JsonResponse
    {
        $param = array_merge(
            $request->only(
                'name',
                'role_id',
                'email',
                'department_id',
                'room_id',
                'status'
            ),
            [INPUT_PAGE => $request->get(INPUT_PAGE) ?? PAGE_DEFAULT]
        );

        $response = $this->userService->list($param);

        return response()->json([
            'success' => true,
            'html' => view('elements.user.list', $response)->render()
        ]);
    }

    /**
     * Display edit of user
     *
     * @param $id
     * @return JsonResponse
     */
    public function edit($id): JsonResponse
    {
        $user = $this->userService->edit($id);

        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }

    /**
     * Admin register new user
     *
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function store(UserRequest $request): JsonResponse
    {
        Gate::authorize('is_head_department');

        $param['user'] = array_merge(
            $request->only(
                'name',
                'email',
                'phone',
                'address',
                'position',
                'certificate',
                'department_id',
                'role_id'
            ),
            ['status' => ACTIVE]
        );

        $param['room_id'] = $request['room_id'];

        return $this->userService->store($param)
            ? response()->json(['success' => __('messages.SM-001')])
            : response()->json(['error' => __('messages.EM-000')], 500);
    }

    /**
     * Admin update user
     *
     * @param UserRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UserRequest $request, $id): JsonResponse
    {
        Gate::authorize('is_head_department');

        $userRequest['user'] = $request->only(
            'name',
            'email',
            'phone',
            'address',
            'position',
            'certificate',
            'department_id'
        );

        $role = $request['role_id'];

        $userRequest['room_id'] = $request['room_id'];

        $result = $this->userService->update($userRequest, $id, $role);

        return isset($result)
            ? response()->json(['success' => __('messages.SM-002')])
            : response()->json(['error' => __('messages.EM-000')], 500);
    }

    /**
     * Delete user
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        Gate::authorize('is_head_department');

        $result = $this->userService->delete($id);

        return isset($result)
            ? response()->json(['success' => __('messages.SM-003')])
            : response()->json(['error' => __('messages.EM-000')], 500);
    }

    /**
     * Update profile login user
     *
     * @param ProfileRequest $request
     * @return JsonResponse
     */
    public function profile(ProfileRequest $request): JsonResponse
    {
        $userRequest = $request->only(
            'name',
            'avatar',
            'email',
            'address',
            'phone',
            'certificate',
        );

        $result = $this->userService->profile($userRequest);

        return isset($result)
            ? response()->json(['success' => __('messages.SM-002')])
            : response()->json(['error' => __('messages.EM-000')], 500);
    }

    /**
     * Password change.
     *
     * @param ChangePasswordRequest $request
     * @return JsonResponse
     */
    public function changePassword(ChangePasswordRequest $request): JsonResponse
    {
        $param = array_merge(
            $request->only(
                'password_old',
                'password',
                'password_confirm',
            ),
            ['email' => RoleHelper::getEmail()]
        );

        $response = $this->authService->resetPassword($param, WEB);

        return $response
            ? response()->json(['success' => __('messages.SM-002')])
            : response()->json(['error' => __('messages.EM-000')], 500);
    }
}
