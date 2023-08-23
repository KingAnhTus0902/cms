<?php

namespace App\Http\Requests;

use App\Models\Hospital;
use Illuminate\Validation\Rule;
use App\Constants\RulesContants;

class HospitalRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'name' => [
                'required',
                Rule::unique(app(Hospital::class)->getTable())->ignore($this->id)->whereNull('deleted_at'),
                'max:255',
            ],
            'code' => [
                'required',
                Rule::unique(app(Hospital::class)->getTable())->ignore($this->id)->whereNull('deleted_at'),
                'string',
                'max:5',
            ],
            'phone' => RulesContants::RULES_PHONE,
            'fax' => 'nullable|max:20',
            'city_id' => 'required',
            'address' => 'max:255',
            'email' => [
                'nullable',
                'bail',
                'email:rfc,dns',
                'max:255',
            ],
            'note' => 'max:255',
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('label.hospital.field.name'),
            'code' => __('label.hospital.field.code'),
            'city_id' => __('label.hospital.field.city_id'),
            'address' => __('label.hospital.field.address'),
            'phone' => __('label.hospital.field.phone'),
            'fax' => __('label.hospital.field.fax'),
            'email' => __('label.hospital.field.email'),
            'note' => __('label.hospital.field.note'),
        ];
    }

    public function messages()
    {
        return [
            'numeric'           => __('messages.EM-005'),
            'regex'             => __('messages.EM-003'),
            'unique'            => __('messages.EM-006'),
            'email'             => __('messages.EM-004'),
            'required'          => __('messages.EM-002'),
            'max'               => __('messages.EM-007'),
            'min_digits'        => __('messages.EM-003'),
            'max_digits'        => __('messages.EM-007'),
            'digits_between'    => __('messages.EM-007'),
        ];
    }
}
