<?php

namespace App\Http\Requests;

use App\Constants\RulesContants;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use App\Models\Cadres;

class CadresRequest extends FormRequest
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
            'name'      => 'required|max:255',
            'birthday'  => 'bail|required|date_format:' . DAY_MONTH_YEAR . '|before:today',
            'gender'    => 'max:1',
            'folk_id'   => 'exists:App\Models\Folk,id',
            'phone'     => 'bail|required|'. RulesContants::RULES_PHONE,
            'job'       => 'max:255',
            'email'     => 'bail|email:rfc,dns|'
            . Rule::unique(app(Cadres::class)->getTable())->ignore($this->id)->whereNull('deleted_at')
            . '|max:255|nullable',
            'address'   => 'max:255',
            'identity_card_number'      => 'bail|numeric|digits_between:1,12|nullable',
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function attributes()
    {
        return [
            'name'      => __('label.cadres.field.name'),
            'birthday'  => __('label.cadres.field.birthday'),
            'gender'    => __('label.cadres.field.gender'),
            'folk_id'   => __('label.cadres.field.folk_id'),
            'phone'     => __('label.cadres.field.phone'),
            'job'       => __('label.cadres.field.job'),
            'email'     => __('label.cadres.field.email'),
            'address'   => __('label.cadres.field.address'),
            'identity_card_number'          => __('label.cadres.field.identity_card_number'),
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'before'            => __('messages.EM-021'),
            'required'          => __('messages.EM-002'),
            'max'               => __('messages.EM-007'),
            'min'               => __('messages.EM-008'),
            'unique'            => __('messages.EM-006'),
            'exists'            => __('messages.EM-032'),
            'date'              => __('messages.EM-003'),
            'email'             => __('messages.EM-004'),
            'size'              => __('messages.EM-014', ['attribute2' => 15]),
            'after'             => __('messages.EM-013', ['attribute2' => __('label.cadres.field.medical_insurance_start_date')]),
            'medical_insurance_start_date.after_or_equal' =>
                __('messages.EM-026', ['attribute1' => __('label.cadres.field.birthday')]),
            'after_or_equal'    => __('messages.EM-031'),
            'regex'             => __('messages.EM-003'),
            'numeric'           => __('messages.EM-005'),
            'digits_between'    => __('messages.EM-007'),
            'min_digits'        => __('messages.EM-003'),
            'max_digits'        => __('messages.EM-007'),
            'between'           => __('messages.EM-025'),
            'date_format'       => __('messages.EM-033'),
            'string'            => __('messages.EM-003'),
            'integer'           => __('messages.EM-003'),
            'between'           => __('messages.EM-019'),
            'before_or_equal' => __('messages.EM-027'),
        ];
    }

    /**
     * Get the error messages for the defined validation rules.*
     * @return array
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
            'code' => Response::HTTP_UNPROCESSABLE_ENTITY
        ], Response::HTTP_OK));
    }
}
