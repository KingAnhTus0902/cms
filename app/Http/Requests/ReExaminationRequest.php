<?php

namespace App\Http\Requests;

class ReExaminationRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            're_examination_date' => 'bail|date_format:' . DAY_MONTH_YEAR . '|after:today|nullable',
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function attributes()
    {
        return [
            're_examination_date' => __('label.medical_session.field.re_examination_date'),
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'date_format'       => __('messages.EM-033'),
            'after'             => __('messages.EM-034'),
        ];
    }
}
