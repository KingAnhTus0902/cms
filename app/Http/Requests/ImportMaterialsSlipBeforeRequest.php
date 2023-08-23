<?php

namespace App\Http\Requests;

use App\Constants\ImportMaterialsSlipConstants;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class ImportMaterialsSlipBeforeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'import_day' => 'required|date_format:d/m/Y',
            'file' => 'required|file|mimes:xlsx|max:' .
                ImportMaterialsSlipConstants::MAX_IMPORT_FILE_SIZE * ImportMaterialsSlipConstants::KBS_IN_ONE_MB,
            'status' => 'nullable|boolean',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'import_day' => __('label.import_materials_slip.field.import_day'),
            'file' => 'Tập tin',
            'status' => 'trạng thái lưu',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'required'  => __('messages.EM-002'),
            'date_format' => __('messages.EM-003'),
            'file' => __('messages.IMS-002'),
            'mimes' => __('messages.IMS-003'),
            'max' => __('messages.EM-0010', ['max' => ImportMaterialsSlipConstants::MAX_IMPORT_FILE_SIZE]),
            'status' => __('messages.IMS-004'),
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json(
                [
                    'errors' => $validator->errors(),
                    'code' => Response::HTTP_BAD_REQUEST
                ],
                Response::HTTP_OK
            )
        );
    }
}
