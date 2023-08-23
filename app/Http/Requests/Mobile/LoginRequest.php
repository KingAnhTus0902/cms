<?php

namespace App\Http\Requests\Mobile;

use App\Traits\FailValidation;
use Illuminate\Contracts\Validation\Rule;
use App\Rules\PasswordRegex;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    use FailValidation;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email:rfc,dns', 'max:255'],
            'password' =>  ['required', 'max:32', new PasswordRegex()],
        ];
    }

    /**
     * Get the validation error message.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => __('messages.EM-002'),
            'email.max' => __('messages.EM-007'),
            'email.email' => __('messages.EM-004'),
            'password.required' => __('messages.EM-002'),
            'password.max' => __('messages.EM-007')
        ];
    }

    /**
     * Get the validation attribute.
     *
     * @return string[]
     */
    public function attributes(): array
    {
        return [
            'email' => __('label.user.email'),
            'password' => __('label.user.password')
        ];
    }
}
