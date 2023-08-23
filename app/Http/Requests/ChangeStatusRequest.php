<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class ChangeStatusRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'status' => [
                'required',
                Rule::in(DEACTIVE, ACTIVE)
            ]
        ];
    }

    public function attributes()
    {
        return [
            'status' => __('label.department.field.code')
        ];
    }

    public function messages()
    {
        return [
            'required' => __('messages.EM-002'),
            'in' => __('messages.EM-025')
        ];
    }
}
