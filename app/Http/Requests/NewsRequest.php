<?php

namespace App\Http\Requests;

use App\Constants\NewsConstants;

class NewsRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'category' => 'required',
            'short_description' => 'required|max:300',
            'thumbnail' => 'image|max:' . NewsConstants::MAX_FILE_SIZE * NewsConstants::KBS_IN_ONE_MB,
            'content' => ['required']
        ];
    }

    public function attributes()
    {
        return [
            'title' => __('label.news.field.title'),
            'category' => __('label.news.field.category'),
            'short_description' => __('label.news.field.short_description'),
            'thumbnail' => __('label.news.field.thumbnail'),
            'content' => __('label.news.field.content'),
        ];
    }

    public function messages()
    {
        return [
            'required' => __('messages.EM-002'),
            'max' => __('messages.EM-007'),
            'image' => __('messages.EM-009'),
            'thumbnail.max' => __('messages.EM-0010', ['max' => NewsConstants::MAX_FILE_SIZE]),
        ];
    }
}
