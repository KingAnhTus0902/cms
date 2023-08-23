<?php

namespace App\Http\Requests;


class SaveMedicalSessionRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'diagnose' => 'required',
            'main_disease_code'          => 'required',
            'conclude' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'main_disease_code' => __('label.disease_of_medical_session.field.main_disease_name'),
            'diagnose' => __('label.hospital_transfer.field.diagnose'),
            'conclude' => __('label.medical_session.field.conclude'),
        ];
    }

    public function messages()
    {
        return [
            'required' => __('messages.EM-002')
        ];
    }
}
