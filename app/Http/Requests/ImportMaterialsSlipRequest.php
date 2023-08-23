<?php

namespace App\Http\Requests;

class ImportMaterialsSlipRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'import_day'             => 'required|date_format:d/m/Y',
            'material.*.name'        => 'bail|required|exists:materials_tbl',
            'material.*.material_id' => 'bail|required_with:material.*.name',
            'material.*.amount'      => 'bail|required|numeric|digits_between:1,10|regex:/^[0-9]+$/',
            'material.*.unit_price'  => 'bail|required|numeric|digits_between:1,10|regex:/^[0-9]+$/',
            'material.*.mfg_date'    => 'required|date_format:d/m/Y',
            'material.*.exp_date'    => 'bail|required|date_format:d/m/Y|after:material.*.mfg_date',
            'material.*.supplier'    => 'max:255',
            'material.*.batch_name'  => 'bail|required|max:255',
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function attributes(): array
    {
        return [
            'import_day'            => __('label.import_materials_slip.field.import_day'),
            'material.*.name'       => __('label.import_materials_slip.add.field.material_name'),
            'material.*.amount'     => __('label.import_materials_slip.add.field.material_amount'),
            'material.*.unit_price' => __('label.import_materials_slip.add.field.material_unit_price'),
            'material.*.mfg_date'   => __('label.import_materials_slip.add.field.material_mfg_date'),
            'material.*.exp_date'   => __('label.import_materials_slip.add.field.material_exp_date'),
            'material.*.supplier'   => __('label.import_materials_slip.add.field.material_supplier'),
            'material.*.batch_name' => __('label.import_materials_slip.add.field.material_batch_name'),
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function messages(): array
    {
        return [
            'required'  => __('messages.EM-002'),
            'min'       => __('messages.EM-008'),
            'max'       => __('messages.EM-007'),
            'unique'    => __('messages.EM-006'),
            'exists'    => __('label.import_materials_slip.add.validate.exists'),
            'date'      => __('messages.EM-003'),
            'email'     => __('messages.EM-004'),
            'size'      => __('messages.EM-014', ['attribute2' => 15]),
            'after'     => __(
                'messages.EM-013',
                ['attribute2' => __('label.import_materials_slip.add.field.material_mfg_date')]
            ),
            'regex'          => __('messages.EM-003'),
            'digits_between' => __('messages.EM-007'),
            'numeric'        => __('messages.EM-005'),
            'before_or_equal' => __('messages.EM-027'),
            'string' => __('messages.EM-003'),
            'material.*.material_id.required_with'
            => __('label.import_materials_slip.add.validate.material_id_required'),
            'date_format' => __('messages.EM-033')
        ];
    }
}
