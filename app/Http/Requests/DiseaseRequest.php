<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class DiseaseRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'code' => ['required', Rule::unique('diseases_mst')->ignore($this->id)->whereNull('deleted_at'), 'max:255'],
            'type' => 'required|integer'
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
            'max' => __('messages.EM-007'),
            'unique' => __('messages.EM-006')
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
            'name' => __('label.disease.name'),
            'code' => __('label.disease.code'),
            'type' => __('label.disease.type')
        ];
    }
}
