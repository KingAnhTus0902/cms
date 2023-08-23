<?php

namespace App\Http\Requests;

use App\Models\Department;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class DepartmentRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'code' => 'required|'
                . Rule::unique(app(Department::class)->getTable())->ignore($this->id)->whereNull('deleted_at')
                . '|max:15',
            'name' => 'required|max:100',
            'address' => 'max:255',
            'location' => 'max:255',
            'note' => 'max:255',
        ];
    }

    public function attributes()
    {
        return [
            'code' => __('label.department.field.code'),
            'name' => __('label.department.field.name'),
            'location' => __('label.department.field.location'),
            'note' => __('label.department.field.note'),
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
