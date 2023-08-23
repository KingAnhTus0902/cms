<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function successResponse($data = null)
    {
        $data['code'] = Response::HTTP_OK;
        return response()->json($data, Response::HTTP_OK);
    }

    public function badRequestErrorResponse($e, $message = null)
    {

        if (!empty($e)) {
            Log::error($e->getFile());
            Log::error($e->getLine());
            Log::error($e->getMessage());
        }

        return response()->json([
            'code' => Response::HTTP_BAD_REQUEST,
            'message' => $message ?? __('messages.EM-000'),
        ], Response::HTTP_BAD_REQUEST);
    }


    public function notFoundErrorResponse()
    {
        return response()->json([
            'code' => Response::HTTP_NOT_FOUND,
            'message' => __('messages.EM-000'),
        ], Response::HTTP_NOT_FOUND);
    }

    /**
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function createSuccessResponse($data = null): \Illuminate\Http\JsonResponse
    {
        $data['message'] = __('messages.SM-001');
        return $this->successResponse($data);
    }


    /**
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateSuccessResponse($data = null): \Illuminate\Http\JsonResponse
    {
        $data['message'] = __('messages.SM-002');
        return $this->successResponse($data);
    }


    /**
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteSuccessResponse($data = null): \Illuminate\Http\JsonResponse
    {
        $data['message'] = __('messages.SM-003');
        return $this->successResponse($data);
    }

    public function internalServerErrorResponse($message = null)
    {
        return response()->json([
            'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
            'message' => $message ?? __('messages.EM-000'),
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function errorForbiddenResponse($message = null)
    {
        return response()->json([
            'code' => Response::HTTP_FORBIDDEN,
            'message' => $message ?? __('errors.FORBIDDEN_ERROR'),
        ], Response::HTTP_FORBIDDEN);
    }

    public function requestNotImplemented($message = null)
    {
        return response()->json([
            'code' => Response::HTTP_NOT_IMPLEMENTED,
            'message' => $message ?? __('errors.FORBIDDEN_ERROR'),
        ], Response::HTTP_NOT_IMPLEMENTED);
    }
}
