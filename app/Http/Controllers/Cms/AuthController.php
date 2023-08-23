<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Services\Auth\AuthServiceInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
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
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $request->session()->invalidate();
        $result = $this->authService->login($request->only('email', 'password'), WEB);
        $request->session()->regenerate();

        if (!$result['code']) {
            return redirect($result['route'])->with('error', __('messages.EM-015'));
        }

        return redirect($result['route']);
    }

    /**
     * Log out
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        $this->authService->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }

    /**
     * Display the password reset view.
     *
     * @param Request $request
     * @return View
     */
    public function resetPasswordForm(Request $request): View
    {
        $data = [
            'email' => $request->email,
            'token' => $request->token
        ];

        return view('auth.reset-password', ['data' => $data]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @param ResetPasswordRequest $request
     * @return RedirectResponse
     */
    public function resetPassword(ResetPasswordRequest $request): RedirectResponse
    {
        list($result, $message) = $this->authService->resetPassword(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            WEB
        );

        if ($result) {
            return redirect()->route('login-page')->with('success', $message);
        }

        return redirect()->back()->withInput($request->only('email'))->with('error', $message);
    }
}
