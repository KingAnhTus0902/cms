<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class ExaminationTypeRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'insurance_unit_price' => 'required|max:10',
            'service_unit_price' => 'required|max:10'
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
            'required' => __('messages.EM-002'),
            'integer' => __('messages.EM-020'),
            'max' => __('messages.EM-007')
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
            'name' => __('label.examination_type.name'),
            'insurance_unit_price' => __('label.examination_type.insurance_unit_price'),
            'service_unit_price' => __('label.examination_type.service_unit_price')
        ];
    }
}
