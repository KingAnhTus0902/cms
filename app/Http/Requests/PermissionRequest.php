<?php

namespace App\Http\Requests;

class PermissionRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255'
        ];
    }

    /**
     * Get the validation error message.
     *
     * @return string[]
     */
    public function messages()
    {
        return [
            'required' => __('messages.EM-002'),
            'max' => __('messages.EM-007')
        ];
    }

    /**
     * Get the validation attribute.
     *
     * @return string[]
     */
    public function attributes()
    {
        return [
            'name' => __('label.permission.name')
        ];
    }
}
