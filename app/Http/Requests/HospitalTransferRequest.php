<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class HospitalTransferRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'cadre_age' => 'required',
            'hospital_id' => 'required',
            'treatment_start_date' => 'bail|required|before_or_equal:today|date_format:' . DAY_MONTH_YEAR,
            'treatment_end_date' =>
                'bail|required|after_or_equal:treatment_start_date|before_or_equal:today|date_format:' . DAY_MONTH_YEAR,
            'clinical_signs' => 'required|max:500',
            'subclinical_results' => 'required|max:500',
            'diagnose' => 'required|max:500',
            'treatment_methods' => 'required|max:500',
            'patient_status' => 'required|max:500',
            'reasons' => 'required',
            'treatment_directions' => 'required|max:500',
            'transit_times' => 'bail|required|date_format:' . DAY_MONTH_YEAR . '|after:yesterday',
            'transportations' => 'required|max:500',
            'escort_information' => 'required|max:500',
        ];

    }

    public function attributes()
    {
        return [
            'cadre_age' => __('label.hospital_transfer.field.age'),
            'hospital_id' => __('label.hospital_transfer.field.hospital_id'),
            'treatment_start_date' => __('label.hospital_transfer.field.treatment_start_date'),
            'treatment_end_date' => __('label.hospital_transfer.field.treatment_end_date'),
            'clinical_signs' => __('label.hospital_transfer.field.clinical_signs'),
            'subclinical_results' => __('label.hospital_transfer.field.subclinical_results'),
            'diagnose' => __('label.hospital_transfer.field.diagnose'),
            'treatment_methods' => __('label.hospital_transfer.field.treatment_methods'),
            'patient_status' => __('label.hospital_transfer.field.patient_status'),
            'reasons' => __('label.hospital_transfer.field.reasons'),
            'treatment_directions' => __('label.hospital_transfer.field.treatment_directions'),
            'transit_times' => __('label.hospital_transfer.field.transit_times'),
            'transportations' => __('label.hospital_transfer.field.transportations'),
            'escort_information' => __('label.hospital_transfer.field.escort_information'),
        ];
    }

    public function messages()
    {
        return [
            'min'               => __('messages.EM-008'),
            'accepted' => __('messages.EM-002'),
            'required' => __('messages.EM-002'),
            'max' => __('messages.EM-007'),
            'date'              => __('messages.EM-003'),
            'regex'             => __('messages.EM-003'),
            'after_or_equal' => __('messages.EM-026', ['attribute1' => __('label.hospital_transfer.field.treatment_start_date')]),
            'before_or_equal' => __('messages.EM-027'),
            'after' => __('messages.EM-031'),
            'date_format'       => __('messages.EM-033'),
        ];
    }
}
