<?php

namespace App\Http\Helpers;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class Tools
{


    public static function jsonResponse($status = 'success', $message = null, $data = null, $code = 200){
        return Response::json([
            'status'  => $status,
            'message' => $message,
            'data'    => $data
        ], $code);
    }



}
