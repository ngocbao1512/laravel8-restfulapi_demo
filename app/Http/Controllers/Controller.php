<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendResponse($message, $data, $status_code = 200)
    {
        return response()->json([   
            'message' => $message.'successful',
            'data' => $data,
            'status_code' => $status_code,
        ], $status_code);
    }

    public function errorResponse($message, $errros = null, $status_code = 400)
    {
        return response()->json([   
            'status_code' => $status_code,
            'message' => $message.'not found',
            'errors' => $errros,
        ], $status_code);
    }

}
