<?php

namespace App\Http\Requests\Mobile;

use App\Traits\FailValidation;
use Illuminate\Foundation\Http\FormRequest;

class VerifyOtpRequest extends FormRequest
{
    use FailValidation;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|exists:cadres_tbl,email',
            'otp' => 'required|max:6|min:6',
        ];
    }

    /**
     * Get the validation error message.
     *
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'email' => __('messages.EM-004'),
            'exists' => __('messages.EM-015'),
            'required' => __('messages.EM-002'),
            'max' => __('messages.EM-007'),
            'min' => __('messages.EM-008')
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
            'email' => __('label.cadres.field.email'),
            'otp' => __('label.user.otp'),
        ];
    }
}
