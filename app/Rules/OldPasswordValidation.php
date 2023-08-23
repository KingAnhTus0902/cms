<?php

namespace App\Rules;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class OldPasswordValidation implements Rule
{
    /**
     * Run the validation.
     *
     * @param string $attribute
     * @param mixed $value
     */
    public function passes($attribute, $value)
    {
        $guard = auth()->getDefaultDriver();
        return Hash::check($value, auth($guard)->user()->password);
    }

    /**
     * Set up the message.
     *
     * @return array|Application|Translator|string|null
     */
    public function message()
    {
        return __('messages.EM-012');
    }
}
