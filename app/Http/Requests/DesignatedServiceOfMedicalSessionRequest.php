<?php

namespace App\Http\Requests;

use App\Models\DesignatedServiceOfMedicalSession;
use Illuminate\Validation\Rule;

class DesignatedServiceOfMedicalSessionRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'designated_service_id' => 'required|integer|exists:designated_services_tbl,id',
            'designated_service_amount' => 'bail|integer|min:1',
            'medical_test_conclude' => [
                Rule::requiredIf(function () {
                    return $this->input('status') !== null;
                }),
            ],
            'medical_test_result' => [
                Rule::requiredIf(function () {
                    return $this->input('status') !== null;
                }),
            ],
            'executor_id' => [
                Rule::requiredIf(function () {
                    return $this->input('status') !== null;
                }),
               'exists:users,id'
            ],
            'status' => [
                'integer',
                Rule::in(
                    DesignatedServiceOfMedicalSession::WAITING,
                    DesignatedServiceOfMedicalSession::PROCESSING,
                    DesignatedServiceOfMedicalSession::FINISH,
                    DesignatedServiceOfMedicalSession::CANCEL
                )
             ]
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
            'min' => __('messages.EM-008'),
            'integer' => __('messages.EM-003'),
            'exists' => __('messages.EM-015'),
            'in' => __('messages.EM-025')
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
            'designated_service_id' => __('label.designated_service_medical_session.designated_service_id'),
            'designated_service_amount' => __('label.designated_service_medical_session.designated_service_amount'),
            'medical_test_result' => __('label.designated_service_medical_session.medical_test_result'),
            'medical_test_conclude' => __('label.designated_service_medical_session.medical_test_conclude'),
            'status' => __('label.designated_service_medical_session.status'),
            'room_id' => __('label.room.field.name')
        ];
    }
}
