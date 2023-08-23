<?php

namespace App\Http\Requests\Mobile;

use App\Rules\OldPasswordValidation;
use App\Rules\PasswordRegex;
use App\Traits\Authorize;
use App\Traits\FailValidation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ChangePasswordRequest extends FormRequest
{
    use Authorize, FailValidation;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'password_old' => [
                'required',
                'max:32',
                new PasswordRegex(),
                new OldPasswordValidation()
            ],
            'password' =>  [
                'required',
                'required_with:password_confirm',
                'different:password_old',
                'max:32',
                new PasswordRegex()
            ],
            'password_confirm' => ['required', 'same:password'],
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
            'password_old.required' => __('messages.EM-002'),
            'password_old.max' => __('messages.EM-007'),
            'password.required' => __('messages.EM-002'),
            'password.max' => __('messages.EM-007'),
            'password.different' => __('messages.EM-010', ['attribute' => __('label.user.new_password')]),
            'password_confirm.required' => __('messages.EM-002'),
            'password_confirm.same' => __('messages.EM-022', ['attribute1' => __('label.user.new_password')]),
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
            'password_old' => __('label.user.old_password'),
            'password' => __('label.user.new_password'),
            'password_confirm' => __('label.user.password_confirm')
        ];
    }
}
