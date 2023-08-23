<?php

namespace App\Http\Requests\Mobile;

use App\Rules\PasswordRegex;
use App\Traits\FailValidation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ResetPasswordRequest extends FormRequest
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
            'password' =>  [
                'required',
                'required_with:password_confirm',
                'max:32',
                new PasswordRegex()
            ],
            'password_confirm' => ['required', 'same:password']
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
            'password.required' => __('messages.EM-002'),
            'password.max' => __('messages.EM-007'),
            'password_confirm.required' => __('messages.EM-002')
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
            'password' => __('label.user.new_password'),
            'password_confirm' => __('label.user.password_confirm')
        ];
    }
}
