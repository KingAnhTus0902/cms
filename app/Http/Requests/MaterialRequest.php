<?php

namespace App\Http\Requests;

use App\Constants\CommonConstants;
use App\Constants\MaterialConstants;
use Illuminate\Validation\Rule;

class MaterialRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'nullable|integer|exists:materials_tbl,id',
            'name' => 'required|string|max:255',
            'mapping_name' => 'nullable|string|max:255',
            'type' => ['required', 'integer', Rule::in(
                MaterialConstants::TYPE_MATERIAL,
                MaterialConstants::TYPE_MEDICINE
            )],
            'active_ingredient_name' => 'nullable|string|max:255',
            'content' => 'nullable|string|max:255',
            'dosage_form' => 'nullable|string|max:255',
            'material_type_id' => 'nullable|integer',
            'unit_id' => 'required|integer',
            'disease_type' => 'nullable|string|max:255',
            'method' => ['required', 'string', Rule::in(
                array_keys(MaterialConstants::METHOD)
            )],
            'usage' => 'required|string',
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
            'name' => __('label.material.field.name'),
            'mapping_name' => __('label.material.field.mapping_name'),
            'type' => __('label.material_type.field.type'),
            'active_ingredient_name' => __('label.material.field.active_ingredient_name'),
            'content' => __('label.material.field.content'),
            'dosage_form' => __('label.material.field.dosage_form'),
            'material_type_id' => __('label.material.field.material_type_id'),
            'unit_id' => __('label.material.field.unit_id'),
            'disease_type' => __('label.material.field.disease_type'),
            'method' => __('label.material.field.method'),
            'usage' => __('label.material.field.usage'),
        ];
    }

    public function messages()
    {
        return [
            'required' => __('messages.EM-002'),
            'max' => __('messages.EM-007'),
            'unique' => __('messages.EM-006'),
            'string' => __('messages.EM-003'),
            'integer' => __('messages.EM-003'),
            'numeric' => __('messages.EM-003'),
            'regex' => __('messages.EM-003'),
            'digits_between' => __('messages.EM-007'),
            'in' => __('messages.EM-028'),
        ];
    }
}
