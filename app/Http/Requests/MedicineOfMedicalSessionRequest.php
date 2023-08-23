<?php

namespace App\Http\Requests;

class MedicineOfMedicalSessionRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'materials_name' => 'required|string|max:255',
            'materials_amount' => 'required|integer|min:1',
            'materials_usage' => 'required|string|max:500',
            'advice' => 'nullable|string|max:500',
        ];
    }

    public function attributes()
    {
        return [
            'materials_name' => __('label.medicine_of_medical_session.field.materials_name'),
            'materials_amount' => __('label.medicine_of_medical_session.field.materials_amount'),
            'materials_usage' => __('label.medicine_of_medical_session.field.materials_usage'),
            'advice' => __('label.medicine_of_medical_session.field.advice'),
        ];
    }

    public function messages()
    {
        return [
            'required' => __('messages.EM-002'),
            'max' => __('messages.EM-007'),
            'string' => __('messages.EM-003'),
            'integer' => __('messages.EM-003'),
            'materials_amount.min' => __('messages.EM-024'),
        ];
    }
}
