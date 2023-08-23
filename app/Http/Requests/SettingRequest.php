<?php

namespace App\Http\Requests;

class SettingRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'hospital_id' => 'required|max:11|exists:App\Models\Hospital,id',
            'default_name' => 'required|max:255',
            'clinic_name' => 'required|max:255',
            'clinic_name_acronym' => 'required|max:255',
            'email' => [
                'required',
                'email:rfc,dns',
                'max:255'
            ],
            'logo.*' => [
                'image', 'max:' . env('MAX_FILE_SIZE', 10240),
            ],
            'address' => 'required|max:255',
            'phone' => [
                'bail',
                'required',
                'numeric',
                'min_digits:10',
                'max_digits:11',
                'regex:' . REGEX_NUMBER
            ],
            'ministry_of_health' => 'required|max:255',
            'base_salary' => 'required|max:10',
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
            'max' => __('messages.EM-007'),
            'min' => __('messages.EM-008'),
            'email' => __('messages.EM-004'),
            'image' => __('messages.EM-009'),
            'regex'             => __('messages.EM-003'),
            'numeric'           => __('messages.EM-005'),
            'min_digits'        => __('messages.EM-003'),
            'max_digits'        => __('messages.EM-007'),
            'exists'            => __('messages.EM-032')
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
            'hospital_id' => __('label.setting.hospital_id'),
            'default_name' => __('label.setting.default_name'),
            'clinic_name' => __('label.setting.clinic_name'),
            'clinic_name_acronym' => __('label.setting.clinic_name_acronym'),
            'email' => __('label.user.email'),
            'logo' => __('label.setting.value'),
            'address' => __('label.user.address'),
            'phone' => __('label.user.phone'),
            'ministry_of_health' => __('label.setting.ministry_of_health'),
            'base_salary' => __('label.setting.base_salary')
        ];
    }
}
