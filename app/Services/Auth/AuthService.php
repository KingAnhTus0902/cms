<?php

namespace App\Services\Auth;

use App\Helpers\QueryHelper;
use App\Helpers\RoleHelper;
use App\Models\Cadres;
use App\Models\User;
use App\Repositories\Cadres\CadresRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Services\BaseService;
use App\Services\Mail\MailServiceInterface;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Throwable;

class AuthService extends BaseService implements AuthServiceInterface
{
    /** @var UserRepositoryInterface */
    protected UserRepositoryInterface $userRepository;

    /** @var CadresRepositoryInterface */
    protected CadresRepositoryInterface $cadresRepository;

    /** @var MailServiceInterface */
    protected MailServiceInterface $mailService;

    /**
     * Constructor
     *
     * @param UserRepositoryInterface $userRepository
     * @param CadresRepositoryInterface $cadresRepository
     * @param MailServiceInterface $mailService
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        CadresRepositoryInterface $cadresRepository,
        MailServiceInterface $mailService
    ) {
        $this->userRepository = $userRepository;
        $this->cadresRepository = $cadresRepository;
        $this->mailService = $mailService;
    }

    /**
     * Login.
     *
     * @param array $credentials
     * @param int $device
     * @return array
     */
    public function login(array $credentials, $device = WEB): array
    {
        try {
            // The user is active, not suspended, and exists.
            $credentials = $credentials + ['status' => ACTIVE];
            // Is user exist
            $user = $this->userRepository->exist('email', $credentials['email']);

            return ($user && auth()->attempt($credentials))
                ? ['code' => true, 'route' => route('home')]
                : ['code' => false, 'route' => route('login')];
        } catch (Throwable) {
            return ($device == MOBILE)
                ? [
                    'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                    'message' => __('messages.EM-000'),
                    'data' => null
                ]
                : ['code' => false, 'route' => route('login')];
        }
    }

    /**
     * Inherited document
     *
     * @return void
     */
    public function logout(): void
    {
        $guard = auth()->getDefaultDriver();

        auth($guard)->logout();
    }

    /**
     * Reset password.
     *
     * @param array $params
     * @param $device
     * @return array
     */
    public function resetPassword(array $params, $device): array
    {
        try {
            $model = $this->userRepository;
            // User
            $user = $model->getDetail(
                [
                    'email' => QueryHelper::setQueryInput($params['email'])
                ],
                ['id', 'email']
            );

            $params['token'] = $params['token'] ?? app(PasswordBroker::class)->createToken($user);

            Password::setDefaultDriver($model->getTable());

            $status = Password::reset(
                $params,
                function ($model) use ($params) {
                    $model->forceFill([
                        'password' => Hash::make($params['password']),
                        'remember_token' => Str::random(60),
                    ])->save();

                    event(new PasswordReset($model));
                }
            );
        } catch (Throwable) {
            return [false, __('messages.EM-000')];
        }

        return $status == Password::PASSWORD_RESET
            ? [true, __($status)]
            : [false, __($status)];
    }

    /**
     * Forgot password.
     *
     * @param $email
     * @param $device
     * @return array
     */
    public function forgotPassword($email, $device): array
    {
        DB::beginTransaction();
        try {
            $model =  $this->userRepository;

            $user = $model->getDetail([
                'email' => QueryHelper::setQueryInput($email)
            ], ['id', 'email', 'name', 'password']);

            $otp = $this->setOtp($user);

            $mailParams = [
                'to' => $email,
                'subject' => __('label.email.forgot'),
                'html_content' => 'emails.user-forgot-password',
                'data' => [
                    'name' => $user['password'],
                    'email' => $user['email'],
                    'otp' => $otp
                ]
            ];

            // Send mail
            $this->mailService->send($this->mailService->init($mailParams));

            return ($device == MOBILE)
                ? [
                    'code' => Response::HTTP_OK,
                    'message' => __('messages.SM-008'),
                    'data' => [
                        'otp' => $otp
                    ]
                ]
                : [true, __('messages.SM-008')];
        } catch (Throwable) {
            return ($device == MOBILE)
                ? ['code' => Response::HTTP_UNAUTHORIZED, 'message' => __('messages.EM-016')]
                : [false, __('messages.SM-012')];
        }
    }

    /**
     * Generate otp.
     *
     * @param $user
     * @return string
     */
    public function setOtp($user): string
    {
        $otp = mt_rand(100000, 999999);

        $this->cadresRepository->updates($user, [
            'otp' => $otp,
            'expired_at' => now()->addMinutes(env('EXPIRED_OTP', 5))
        ]);

        return $otp;
    }
}
