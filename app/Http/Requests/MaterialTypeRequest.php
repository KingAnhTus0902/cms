<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class MaterialTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'code' => 'required|' . (!isset($this->id) ? 'unique:materials_types,code' : '') . '|max:20',
            'name' => 'required|max:255',
            'note' => 'max:255',
        ];
    }

    /**
     * Get the attributes that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function attributes()
    {
        return [
            'code' => __('label.material_type.field.code'),
            'name' => __('label.material_type.field.name'),
            'note' => __('label.material_type.field.note'),
        ];
    }

    /**
     * Get the messages that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'required'  => __('messages.EM-002'),
            'max'       => __('messages.EM-007'),
            'unique'    => __('messages.EM-006'),
        ];
    }

    /**
     * Get the error messages for the defined validation rules.*
     *
     * @return array
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors'    => $validator->errors(),
            'code'      => Response::HTTP_UNPROCESSABLE_ENTITY
        ], Response::HTTP_OK));
    }
}
