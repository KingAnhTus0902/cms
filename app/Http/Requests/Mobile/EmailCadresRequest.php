<?php

namespace App\Http\Requests\Mobile;

use App\Traits\FailValidation;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EmailCadresRequest extends FormRequest
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
            'email' => 'required|email|exists:cadres_tbl,email',
        ];
    }

    /**
     * Get the validation error message.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'email.required' => __('messages.EM-002'),
            'email.email' => __('messages.EM-004'),
            'email.exists' => __('messages.EM-015')
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
        ];
    }
}
