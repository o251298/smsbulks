<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/register', function (){
    $data = ['data' => 'register_success'];
    return response()->json($data, 200);
});
Route::get('/originator', function (){
    $data = ['data' => 'originator_success'];
    return response()->json($data, 200);
});
Route::get('/balance', function (){
    $data = ['data' => 'balance_success'];
    return response()->json($data, 200);
});
Route::get('/message/send', function (){
    $data = ['data' => 'message_send_success'];
    return response()->json($data, 200);
});
