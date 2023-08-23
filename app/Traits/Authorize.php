<?php

namespace App\Traits;

trait Authorize
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $guard = auth()->getDefaultDriver();
        if (auth()->guard($guard)->user()) {
            return true;
        }

        return false;
    }
}
