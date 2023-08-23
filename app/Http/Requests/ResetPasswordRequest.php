<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use App\Rules\PasswordRegex;

class ResetPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'token' => ['required'],
            'email' => ['required', 'email:rfc,dns'],
            'password' => [
                'required',
                'min:8',
                'max:32',
                Rules\Password::defaults(),
                new PasswordRegex()
            ],
            'password_confirmation' => [
                'required',
                'min:8',
                'max:32',
                'same:password'
            ]
        ];
    }

    /**
     * Get the validation error message.
     *
     * @return array<string, Rule|array|string>
     */
    public function messages(): array
    {
        return [
            'email.required' => __('messages.EM-002'),
            'email.max' => __('messages.EM-007'),
            'email.email' => __('messages.EM-004'),
            'password.required' => __('messages.EM-002'),
            'password.min' => __('messages.EM-008'),
            'password.max' => __('messages.EM-007'),
            'password_confirmation.required' => __('messages.EM-002'),
            'password_confirmation.min' => __('messages.EM-008'),
            'password_confirmation.max' => __('messages.EM-007'),
            'password_confirmation.same' => __('messages.EM-010')
        ];
    }
}
