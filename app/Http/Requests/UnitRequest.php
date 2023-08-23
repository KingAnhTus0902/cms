<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UnitRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'nullable|integer|exists:units_mst,id',
            'code' => 'required|string|max:20|' . Rule::unique('units_mst')->ignore($this->id)->whereNull('deleted_at'),
            'name' => 'required|string|max:255',
            'note' => 'nullable|string|max:255',
        ];
    }

    /**
     * attributes
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'code' => __('label.unit.field.code'),
            'name' => __('label.unit.field.name'),
            'note' => __('label.unit.field.note'),
        ];
    }

    public function messages()
    {
        return [
            'required' => __('messages.EM-002'),
            'max' => __('messages.EM-007'),
            'unique' => __('messages.EM-006'),
        ];
    }
}
