<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\RolesUsers;
use App\Models\User;
use App\Models\Wallet;
use App\Services\APITransceiver\Authorization;
use App\Services\APITransceiver\ResponseApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function store(Request $request)
    {
        try {
            $user = Authorization::createUser($request);
            return response()->json(new ResponseApi('success', ['token' => $user->api_token, 'id' => $user->id]));
        } catch (\Exception $exception){
            return response()->json(new ResponseApi('error', json_decode($exception->getMessage())));
        }
    }

    public function balance(Request $request)
    {
        try {
            Authorization::Auth($request->header('Authorization'));
            return response()->json(new ResponseApi('success', ['balance' => Auth::user()->getWallet()->first()['current_sum']]));
        } catch (\Exception $exception){
            return response()->json(new ResponseApi('error', json_decode($exception->getMessage())));
        }
    }

}
