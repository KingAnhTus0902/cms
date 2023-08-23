<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use App\Constants\RulesContants;

class UserRequest extends BaseRequest
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
            'email' => [
                'required',
                'email:rfc,dns',
                Rule::unique('users')->ignore($this->id)->whereNull('deleted_at'),
                'max:255'
            ],
            'phone' => [
                'bail',
                'required',
                'numeric',
                'min_digits:10',
                'max_digits:11',
                'regex:' . REGEX_NUMBER
               ],
            'address' => 'required|max:255',
            'position' => 'required|max:255',
            'role_id' => 'required|integer|exists:roles,id',
            'department_id' => [
                Rule::requiredIf(function () {
                    return in_array($this->input('role_id'), [
                        User::$role[EXAMINATION_DOCTOR],
                        User::$role[REFERRING_DOCTOR],
                    ]);
                }),
                'nullable',
                'integer',
                'exists:departments_mst,id'
            ],
            'room_id' => [
                Rule::requiredIf(function () {
                    return in_array($this->input('role_id'), [
                        User::$role[EXAMINATION_DOCTOR],
                        User::$role[REFERRING_DOCTOR],
                    ]);
                }),
                'nullable',
                'array'
            ],
            'room_id.*' => 'nullable|integer|exists:rooms_mst,id',
            'certificate' => [
                Rule::requiredIf(function () {
                    return in_array($this->input('role_id'), [
                        User::$role[EXAMINATION_DOCTOR],
                        User::$role[REFERRING_DOCTOR],
                        User::$role[PHARMACIST]
                    ]);
                }),
                'max:255'
            ]
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
            'required'          => __('messages.EM-002'),
            'max'               => __('messages.EM-007'),
            'unique'            => __('messages.EM-006'),
            'min'               => __('messages.EM-008'),
            'integer'           => __('messages.EM-003'),
            'email'             => __('messages.EM-004'),
            'regex'             => __('messages.EM-003'),
            'numeric'           => __('messages.EM-005'),
            'min_digits'        => __('messages.EM-003'),
            'max_digits'        => __('messages.EM-007'),
            'array'             => __('messages.EM-025')
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
            'name' => __('label.user.name'),
            'email' => __('label.user.email'),
            'phone' => __('label.user.phone'),
            'address' => __('label.user.address'),
            'position' => __('label.user.position'),
            'department_id' => __('label.user.department_id'),
            'certificate' => __('label.user.certificate'),
            'role_id' =>  __('label.user.role_id'),
            'room_id' =>  __('label.user.room_id'),
        ];
    }
}
