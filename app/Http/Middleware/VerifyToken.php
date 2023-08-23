<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class VerifyToken
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        try {
            Config::set('auth.defaults.guard', 'mobile');
            $token = JWTAuth::getToken();
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                if (Route::current()->getName() == 'mobile.logout') {
                    JWTAuth::invalidate($token);
                } else {
                    return response()->json(
                        [
                            'code' => Response::HTTP_NOT_FOUND,
                            'message' => __('auth.notfound'),
                            'data' => null
                        ],
                        Response::HTTP_NOT_FOUND
                    );
                }
            }

            $request->user = $user;
            return $next($request);

        } catch (TokenExpiredException $e) {
            return response()->json(
                [
                    'code' => Response::HTTP_UNAUTHORIZED,
                    'message' => __('auth.expired'),
                    'data' => null
                ],
                Response::HTTP_UNAUTHORIZED
            );
        } catch (TokenInvalidException $e) {
            return response()->json(
                [
                    'code' => Response::HTTP_FORBIDDEN,
                    'message' => __('auth.invalid'),
                    'data' => null
                ],
                Response::HTTP_FORBIDDEN
            );
        } catch (JWTException $e) {
            return response()->json(
                [
                    'code' => Response::HTTP_BAD_REQUEST,
                    'message' => __('auth.absent'),
                    'data' => null
                ],
                Response::HTTP_BAD_REQUEST
            );
        }
    }
}
