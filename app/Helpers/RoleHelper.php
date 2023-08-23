<?php

namespace App\Helpers;

use Tymon\JWTAuth\Facades\JWTAuth;

class RoleHelper
{
    /**
     * Set array of the query input.
     *
     * @return ?string
     */
    public static function getName(): ?string
    {
        if (auth()->check()) {
            return auth()->user()->getRoleNames()[0];
        }
        return null;
    }

    /**
     * Set array of the query input.
     *
     * @param string $guard
     * @return ?string
     */
    public static function getEmail(string $guard = 'web'): ?string
    {
        if (auth($guard)->check()) {
            return auth($guard)->user()->email;
        }
        return null;
    }

    /**
     * Set array of the query input.
     *
     * @param string $guard
     * @return ?string
     */
    public static function getToken(string $guard = 'web'): ?string
    {
        if (auth($guard)->check()) {
            return JWTAuth::getToken();
        }
        return null;
    }

    /**
     * Get by role
     *
     * @param array $role
     * @return bool
     */
    public static function getByRole(array $role): bool
    {
        if (auth()->user()->hasRole($role)) {
            return true;
        }
        return false;
    }
}
