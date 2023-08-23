<?php

namespace App\Http\Controllers\Mobile;

use App\Helpers\RoleHelper;
use App\Http\Requests\Mobile\ChangePasswordRequest;
use App\Http\Requests\Mobile\EmailCadresRequest;
use App\Http\Requests\Mobile\LoginRequest;
use App\Http\Requests\Mobile\ResetPasswordRequest;
use App\Http\Requests\Mobile\VerifyOtpRequest;
use App\Services\Auth\AuthServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class AuthController extends BaseController
{
    /** @var AuthServiceInterface */
    protected AuthServiceInterface $authService;

    /**
     * Base construction
     *
     * @param AuthServiceInterface $authService
     */
    public function __construct(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Login
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $response = $this->authService->login($request->only('email', 'password'), MOBILE);

        return $this->response($response['code'], $response['message'], $response['data']);
    }

    /**
     * Log out
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        $this->authService->logout();

        return $this->response(Response::HTTP_OK, __('messages.SM-005'));
    }

    /**
     * Password reset.
     *
     * @param ResetPasswordRequest $request
     * @return JsonResponse
     */
    public function resetPassword(ResetPasswordRequest $request): JsonResponse
    {
        $param = array_merge(
            $request->only(
                'email',
                'password',
                'password_confirm',
            ),
        );

        $response = $this->authService->resetPassword($param, MOBILE);

        return $this->response($response['code'], $response['message']);
    }

    /**
     * Password change.
     *
     * @param ChangePasswordRequest $request
     * @return JsonResponse
     */
    public function changePassword(ChangePasswordRequest $request): JsonResponse
    {
        $email = RoleHelper::getEmail('mobile');

        $param = array_merge(
            $request->only(
                'password_old',
                'password',
                'password_confirm',
            ),
            ['email' => $email]
        );

        $response = $this->authService->resetPassword($param, MOBILE);

        return $this->response($response['code'], $response['message']);
    }

    /**
     * Get forgot password page
     *
     * @param EmailCadresRequest $request
     * @return JsonResponse
     */
    public function forgotPassword(EmailCadresRequest $request): JsonResponse
    {
        $param = $request->get('email');

        $response = $this->authService->forgotPassword($param, MOBILE);

        return $this->response($response['code'], $response['message'], $response['data']);
    }

    /**
     * Compare OTP code and confirm code
     *
     * @param VerifyOtpRequest $request
     * @return JsonResponse
     */
    public function verifyOtp(VerifyOtpRequest $request): JsonResponse
    {
        $param = $request->only('otp', 'email');

        $response = $this->authService->getOtp($param);

        return $this->response($response['code'], $response['message']);
    }
}
