<?php

namespace App\Helpers;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ResponseHelper
{
    public static function success(
        mixed $message = null,
        mixed $data = null,
        int $code = Response::HTTP_OK,
        bool $pagination = false
    ): JsonResponse {
        if ($pagination) {
            $dataArray = $data->toArray(request());

            return response()->json([
                'pagination' => $dataArray['pagination'] ?? [],
                'data' => $dataArray['data'],
                'meta' => [
                    'code' => $code,
                    'status' => 'success',
                    'message' => $message,
                ],
            ], $code);
        }

        return response()->json([
            'meta' => [
                'code' => $code,
                'status' => 'success',
                'message' => $message,
            ],
            'data' => $data,
        ], $code);
    }

    public static function error(
        mixed $message = null,
        mixed $data = null,
        int $code = Response::HTTP_BAD_REQUEST
    ): JsonResponse {
        $res = [
            'meta' => [
                'code' => $code,
                'status' => 'error',
                'message' => $message,
            ],
            'data' => $data,
        ];

        return response()->json($res, $code);
    }
}
