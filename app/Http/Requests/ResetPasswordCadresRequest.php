<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class ResetPasswordCadresRequest extends FormRequest
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
            'old_password'      => 'required',
            'password'          => 'required|min:8|different:old_password',
            'confirm_password'  => 'required|same:password',
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function attributes()
    {
        return [
            'old_password'      => __('label.cadres.field.old_password'),
            'password'          => __('label.cadres.field.new_password'),
            'confirm_password'  => __('label.cadres.field.confirm_password'),
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'required'  => __('messages.EM-002'),
            'min'       => __('messages.EM-008'),
            'different' => __('messages.EM-010'),
            'same'      => __('messages.EM-011')

        ];
    }

    /**
     * Get the error messages for the defined validation rules.*
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
