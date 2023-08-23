<?php

namespace App\Http\Requests;

use App\Models\DesignatedServiceOfMedicalSession;
use Illuminate\Validation\Rule;

class DSMedicalSessionStatusRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'status' => ['required', 'integer', Rule::in(
                DesignatedServiceOfMedicalSession::WAITING,
                DesignatedServiceOfMedicalSession::PROCESSING,
                DesignatedServiceOfMedicalSession::FINISH,
                DesignatedServiceOfMedicalSession::CANCEL
            )]
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
            'status' => __('label.designated_service_medical_session.status'),
        ];
    }
}
