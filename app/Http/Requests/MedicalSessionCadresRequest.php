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
