<?php

namespace App\Http\Requests;

class HealthInsuranceCardHeadRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'nullable|integer|exists:health_insurance_card_head_mst,id',
            'code' => [
                'bail',
                'nullable',
                'integer',
                'between:1,5'
            ],
            'discount_right_line' => 'required|numeric|max:100|regex:/^[0-9]*([\.\,][0-9]+)?$/',
            'discount_opposite_line' => 'nullable|numeric|max:100|regex:/^[0-9]*([\.\,][0-9]+)?$/',
        ];
    }

    /**
     * attributes
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'code' => __('label.health_insurance_card_head.field.code'),
            'discount_right_line' => __('label.health_insurance_card_head.field.discount_right_line'),
            'discount_opposite_line' => __('label.health_insurance_card_head.field.discount_opposite_line'),
        ];
    }

    public function messages()
    {
        return [
            'required' => __('messages.EM-002'),
            'max' => __('messages.EM-007'),
            'discount_right_line.max' => __('messages.EM-018'),
            'discount_opposite_line.max' => __('messages.EM-018'),
            'unique' => __('messages.EM-006'),
            'string' => __('messages.EM-003'),
            'integer' => __('messages.EM-003'),
            'numeric' => __('messages.EM-003'),
            'between' => __('messages.EM-019'),
            'regex' => __('messages.EM-003'),
            'min' => __('messages.EM-008'),
        ];
    }
}
