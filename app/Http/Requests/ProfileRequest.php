<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;

class ProfileRequest extends BaseRequest
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
                Rule::unique('users')->ignore(auth()->user()->id)->whereNull('deleted_at'),
                'max:255'
            ],
            'avatar.*' => [
                'image', 'max:' . env('MAX_FILE_SIZE', 10240),
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
            'certificate' => [
                Rule::requiredIf(function () {
                    return in_array(auth()->user()->roles?->first()->id, [
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
            'required' => __('messages.EM-002'),
            'max' => __('messages.EM-007'),
            'unique' => __('messages.EM-006'),
            'min' => __('messages.EM-008'),
            'integer' => __('messages.EM-003'),
            'email' => __('messages.EM-004'),
            'image' => __('messages.EM-009'),
            'regex'             => __('messages.EM-003'),
            'numeric'           => __('messages.EM-005'),
            'min_digits'        => __('messages.EM-003'),
            'max_digits'        => __('messages.EM-007'),
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
            'certificate' => __('label.user.certificate'),
            'avatar' => __('label.user.avatar')
        ];
    }
}
