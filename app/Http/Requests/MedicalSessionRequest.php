<?php

namespace App\Http\Requests;

use App\Models\Department;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class MedicalSessionRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'department_id'          => 'required',
            'room_id'                => 'required',
            'reason_for_examination' => 'max:255',
        ];
    }

    public function attributes()
    {
        return [
            'department_id'          => __('label.medical_session.field.department'),
            'room_id'                => __('label.medical_session.field.room'),
            'status_medical'         => __('label.medical_session.field.status'),
            'reason_for_examination' => __('label.medical_session.field.reason_for_examination'),
        ];
    }

    public function messages()
    {
        return [
            'required' => __('messages.EM-002'),
            'max' => __('messages.EM-007'),
        ];
    }
}
