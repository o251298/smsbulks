<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\APITransceiver\Authorization;
use App\Services\APITransceiver\ResponseApi;
use App\Services\APITransceiver\Transceiver;
use App\Services\SingleMessage\SendSingle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    public function send(Request $request)
    {
        try {
            Authorization::Auth($request->header('Authorization'));
            $test = new Transceiver($request);
            return response()->json(new ResponseApi('success', json_decode($test->response)));
        } catch (\Exception $exception){
            $data = ['error' => json_decode($exception->getMessage())];
            return response()->json(new ResponseApi('error', $data));
        }
    }



}
