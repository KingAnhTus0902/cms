<?php

namespace App\Http\Requests;

use App\Constants\CommonConstants;
use App\Constants\DesignatedServiceConstants;
use Illuminate\Validation\Rule;

class DesignatedServiceRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'description' => [
                'nullable',
                'string'
            ],
            'insurance_surcharge' => CommonConstants::RULE_VALIDATE_PRICE,
            'service_unit_price' => CommonConstants::RULE_VALIDATE_PRICE,
            'insurance_unit_price' => CommonConstants::RULE_VALIDATE_PRICE,
            'decision_number' => 'max:100',
            'insurance_code' => 'nullable|max:15|regex:/^[a-zA-Z0-9 .]+$/',
            'type_surgery' => ['required', 'integer', Rule::in(
                array_keys(DesignatedServiceConstants::TYPE_SURGERY)
            )],
            'specialist' => ['required', 'integer', Rule::in(
                array_keys(DesignatedServiceConstants::SPECIALIST)
            )],
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('label.designated_service.field.name'),
            'description' => __('label.designated_service.field.description'),
            'insurance_code' => __('label.designated_service.field.insurance_code'),
            'insurance_surcharge' => __('label.designated_service.field.insurance_surcharge'),
            'service_unit_price' => __('label.designated_service.field.service_unit_price'),
            'insurance_unit_price' => __('label.designated_service.field.insurance_unit_price'),
            'decision_number' => __('label.designated_service.field.decision_number'),
            'type_surgery' => __('label.designated_service.field.type_surgery'),
            'specialist' => __('label.designated_service.field.specialist'),
        ];
    }

    public function messages()
    {
        return [
            'regex' => __('messages.EM-005'),
            'digits_between' => __('messages.EM-007'),
            'required' => __('messages.EM-002'),
            'max' => __('messages.EM-007'),
            'string' => __('messages.EM-003'),
            'integer' => __('messages.EM-003'),
            'in' => __('messages.EM-028'),
        ];
    }
}
