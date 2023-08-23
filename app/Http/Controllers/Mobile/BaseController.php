<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class BaseController extends Controller
{
    /**
     * Set the response for return api
     *
     * @param int $code
     * @param string $message
     * @param $data
     * @return JsonResponse
     */
    public function response(int $code = Response::HTTP_OK, string $message = '', $data = null): JsonResponse
    {
        return $this->responseTransform($message, $code, $data);
    }

    /**
     * Transform response
     *
     * @param string $message
     * @param int $code
     * @param null $data
     * @param null $errors
     * @return JsonResponse
     */
    private static function responseTransform(string $message, int $code, $data = null, $errors = null): JsonResponse
    {
        $response = [
            'code' => $code,
            'message' => $message ?: __(Response::$statusTexts[$code]),
            'data' => $data
        ];

        if ($errors) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $code);
    }
}
