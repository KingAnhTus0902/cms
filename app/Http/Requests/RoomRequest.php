<?php

namespace App\Http\Requests;

use App\Models\Room;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class RoomRequest extends FormRequest
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
            'code' => 'required|'
                . Rule::unique(app(Room::class)->getTable())->ignore($this->id)->whereNull('deleted_at')
                . '|max:20',
            'name' => 'required|max:255',
            'department_id' => 'required',
            'location' => 'max:255',
            'note' => 'max:255',
        ];
    }

    public function attributes()
    {
        return [
            'code' => __('label.room.field.code'),
            'name' => __('label.room.field.name'),
            'location' => __('label.room.field.location'),
            'note' => __('label.room.field.note'),
            'department_id' => __('label.room.field.department'),
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
