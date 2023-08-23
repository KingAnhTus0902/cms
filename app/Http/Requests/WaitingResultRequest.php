<?php

namespace App\Http\Requests;


class WaitingResultRequest extends BaseRequest
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
        ];
    }

    public function attributes()
    {
        return [
            'diagnose' => __('label.hospital_transfer.field.diagnose'),
        ];
    }

    public function messages()
    {
        return [
            'required' => __('messages.EM-002')
        ];
    }
}
