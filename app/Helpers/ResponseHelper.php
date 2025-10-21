<?php
namespace App\Helpers;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ResponseHelper
{
    /**
     * @var array
     */

    public static array $res = [
      'meta' => [
        'code' => null,
        'status' => 'success',
        'message' => null,
        'pagination' => null
      ]
    ];

    /**
     * Success Response
     * @param mixed||null $message
     * @param mixed||null $data
     * @param int $code
     * @param bool $pagination
     * @return JsonResponse
     */

    public static function success(mixed $data = null, mixed $message = null, int $code = Response::HTTP_OK, bool $pagination = false){
        self::$res['meta']['message'] = $message;
        self::$res['meta']['code'] = $code;
        if ($pagination) {
            $dataArray = $data->toArray(request());
            $response = [
                'pagination' => $dataArray['pagination'] ?? [],
                'data' => $dataArray['data'],
                'meta' => [
                    'code' => $code,
                    'status' => 'success',
                    'message' => $message,
                ],
            ];
            return response()->json($response,$code);
        }else {
            self::$res['data'] = $data;
            unset(self::$res['meta']['pagination']);
            return response()->json(self::$res);
        }
    }

    /**
     * @param mixed||null $data
     * @param mixed||null $message
     * @param int $code
     * @return JsonResponse
     */

    public static function error(mixed $data = null, mixed $message = null, int $code = Response::HTTP_BAD_REQUEST): JsonResponse
    {
        self::$res['meta']['status'] = 'error';
        self::$res['meta']['code'] = $code;
        self::$res['meta']['message'] = $message;
        self::$res['data'] = $data;
        unset(self::$res['meta']['pagination']);

        return response()->json(self::$res, self::$res['meta']['code']);

        throw new HttpResponseException($res);
    }


}

?>
