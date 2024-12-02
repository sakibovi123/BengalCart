<?php

namespace App\Http\Traits;

trait ResponseTrait
{
    protected function successResponse( $data=null, $message, $code = 200)
    {
        return response()
            ->json([
                'success' => true,
                'message' => $message,
                'data' => $data
            ], $code);
    }

    protected function errorResponse( $message, $code = 400)
    {
        return response()
            ->json([
                'success' => false,
                'message' => $message,
            ], $code);
    }
}

