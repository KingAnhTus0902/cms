<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExaminationRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'medical_session_id' => 'exists:App\Models\MedicalSession,id',
            'circuit'           => 'nullable|numeric',
            'temperature'       => 'nullable|numeric',
            'blood_pressure'    => 'nullable|numeric',
            'breathing'         => 'nullable|numeric',
            'height'            => 'nullable|numeric',
            'weight'            => 'nullable|numeric',
            'treatment_days'    => 'nullable|numeric',
            'bmi'               => 'nullable|numeric',
            'status'            => 'nullable|numeric',
            'reason_for_examination' => 'nullable|max:500',
            'pathological_process' => 'nullable|max:500',
            'personal_history' => 'nullable|max:500',
            'family_history' => 'nullable|max:500',
        ];
    }

    /**
     * Get the attributes rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function attributes()
    {
        return [
            'circuit'           => __('label.examination.field.circuit'),
            'temperature'       => __('label.examination.field.temperature'),
            'blood_pressure'    => __('label.examination.field.blood_pressure'),
            'breathing'         => __('label.examination.field.breathing'),
            'height'            => __('label.examination.field.height'),
            'weight'            => __('label.examination.field.weight'),
            'treatment_days'    => __('label.examination.field.treatment_days'),
            'bmi'               => __('label.examination.field.bmi'),
            'status'            => __('label.medical_session.field.status'),
            'reason_for_examination'            => __('label.medical_session.field.reason_for_examination'),
            'pathological_process'            => __('label.examination.field.pathological_process'),
            'personal_history'            => __('label.examination.field.personal_history'),
            'family_history'            => __('label.examination.field.family_history'),
        ];
    }

    /**
     * Get the messages rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'numeric' => __('messages.EM-005'),
            'exists'  => __('messages.EM-001'),
            'max' => __('messages.EM-007')
        ];
    }
}
