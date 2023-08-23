<?php

namespace App\Rules;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Contracts\Validation\Rule;

class PasswordRegex implements Rule
{
    /**
     * Run the validation.
     *
     * @param string $attribute
     * @param mixed $value
     */
    public function passes($attribute, $value)
    {
        return preg_match(REGEX_CREDENTIAL_VALIDATION, $value);
    }

    /**
     * Set up the message.
     *
     * @return array|Application|Translator|string|null
     */
    public function message()
    {
        return __('messages.EM-005');
    }
}
