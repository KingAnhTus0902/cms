<?php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

trait FailValidation
{
    /**
     * Get the error messages for the defined validation rules.*
     *
     * @param Validator $validator
     * @return array
     */
    protected function failedValidation(Validator $validator): array
    {
        throw new HttpResponseException(response()->json([
            'code'      => \Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY,
            'message'    => $validator->errors()->first(),
            'data' => null
        ], Response::HTTP_OK));
    }

    /**
     * Get the success messages for the defined validation rules.*
     *
     * @return void
     */
    protected function passedValidation(): void
    {
        (new FormRequest)->passedValidation();
    }
}
