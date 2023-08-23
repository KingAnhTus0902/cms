<?php

namespace App\Http\Requests;

use App\Constants\MedicalSessionConstants;
use App\Models\Cadres;
use Illuminate\Validation\Rule;
use App\Constants\RulesContants;

class MedicalSessionCadresRequest extends BaseRequest
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
            'birthday' => 'bail|required|date_format:' . DAY_MONTH_YEAR . '|before:today',
            'gender' => 'max:1',
            'phone' => 'bail|required|' . RulesContants::RULES_PHONE,
            'job' => 'nullable|string|max:255',
            'email' => 'nullable|email:rfc,dns|max:255|'
                . Rule::unique(app(Cadres::class)->getTable())->ignore((int)$this->cadre_id_check)
                    ->whereNull('deleted_at'),
            'address' => 'max:255',
            'identity_card_number' => [
                'bail',
                'nullable',
                'numeric',
                'digits_between:0,12',
                'regex:' . REGEX_NUMBER,
            ],
            'medical_insurance_number' => [
                'bail',
                'required',
                'min:10',
                'max:15',
                'regex:' . REGEX_NUMBER_INSURANCE_CADR,
            ],
            'medical_insurance_symbol_code' => [
                'bail',
                'nullable',
                'integer',
                'between:1,5'
            ],
            'medical_insurance_live_code' => 'nullable|string|min:2|max:2',
            'medical_insurance_start_date' => [
                'bail',
                'nullable',
                'before_or_equal:today',
                'date_format:' . DAY_MONTH_YEAR,
                Rule::requiredIf($this->medical_insurance_number !== null),
                'after_or_equal:birthday',
            ],
            'medical_insurance_end_date' => [
                'bail',
                'nullable',
                'after:medical_insurance_start_date',
                'after_or_equal:today',
                'date_format:' . DAY_MONTH_YEAR
            ],
            'medical_insurance_address' => '' . Rule::requiredIf($this->medical_insurance_number !== null) . '|max:255',
            'hospital_code' => [
                Rule::requiredIf($this->medical_insurance_number !== null),
                'nullable',
                'min:5',
                'max:5',
                'exists:hospitals_mst,code',
            ],
            'insurance_five_consecutive_years' => [
                'bail',
                'nullable',
                'date_format:' . DAY_MONTH_YEAR,
                Rule::requiredIf(!empty($this->is_long_date)),
                'after_or_equal:birthday'
            ],
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function attributes()
    {
        return [
            'name' => __('label.cadres.field.name'),
            'birthday' => __('label.cadres.field.birthday'),
            'gender' => __('label.cadres.field.gender'),
            'folk_id' => __('label.cadres.field.folk_id'),
            'phone' => __('label.cadres.field.phone'),
            'job' => __('label.cadres.field.job'),
            'email' => __('label.cadres.field.email'),
            'address' => __('label.cadres.field.address'),
            'identity_card_number' => __('label.cadres.field.identity_card_number'),
            'medical_insurance_number' => __('label.cadres.field.medical_insurance_number'),
            'medical_insurance_symbol_code' => __('label.cadres.field.medical_insurance_symbol_code'),
            'medical_insurance_live_code' => __('label.cadres.field.medical_insurance_live_code'),
            'medical_insurance_start_date' => __('label.cadres.field.medical_insurance_start_date'),
            'medical_insurance_end_date' => __('label.cadres.field.medical_insurance_end_date'),
            'medical_insurance_address' => __('label.cadres.field.medical_insurance_address'),
            'hospital_code' => __('label.cadres.field.hospital_code'),
            'insurance_five_consecutive_years'  => __('label.cadres.field.insurance_five_consecutive_years')
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'required'          => __('messages.EM-002'),
            'min'               => __('messages.EM-008'),
            'max'               => __('messages.EM-007'),
            'unique'            => __('messages.EM-006'),
            'exists'            => __('messages.EM-032'),
            'date_format'       => __('messages.EM-033'),
            'email'             => __('messages.EM-004'),
            'size'              => __('messages.EM-014', ['attribute2' => 15]),
            'regex'             => __('messages.EM-003'),
            'digits_between'    => __('messages.EM-007'),
            'min_digits'        => __('messages.EM-003'),
            'max_digits'        => __('messages.EM-007'),
            'numeric'           => __('messages.EM-005'),
            'string'            => __('messages.EM-003'),
            'before'            => __('messages.EM-021'),
            'after'             => __('messages.EM-030'),
            'medical_insurance_start_date.after_or_equal' =>
                __('messages.EM-026', ['attribute1' => __('label.cadres.field.birthday')]),
            'insurance_five_consecutive_years.after_or_equal' =>
                __('messages.EM-026', ['attribute1' => __('label.cadres.field.birthday')]),
            'after_or_equal'    => __('messages.EM-031'),
            'integer'           => __('messages.EM-003'),
            'between'           => __('messages.EM-019'),
            'before_or_equal' => __('messages.EM-027'),
        ];
    }
}
