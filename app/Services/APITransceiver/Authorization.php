<?php


namespace App\Services\APITransceiver;


use App\Models\RolesUsers;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Authorization
{
    public static function Auth($bear_token)
    {
        $token = substr($bear_token, strpos($bear_token, ' ') + 1, strlen($bear_token) - strpos($bear_token, ' '));
        $user = User::getByToken($token);
        if (!$user){
            $error = ['user' => 'Not Found by this token'];
            throw new \Exception(json_encode($error));
        }
        Auth::loginUsingId($user->id);
        return $user;
    }

    public static function createUser($request)
    {
        if (!$request->name || !$request->email){
            throw new \Exception(json_encode(['user' => "Please submit only email and name"]));
        }
        $password = md5(time() * rand(0, 10000));
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
            'api_token' => Str::random(60),
        ]);
        $role = RolesUsers::create([
            'user_id' => $user->id,
            'role_id' => 2
        ]);
        $wallet = Wallet::create([
            'user_id' => $user->id,
            'current_sum' => 5.00
        ]);
        if (!$user || !$role || !$wallet){
            throw new \Exception(json_encode(['user' => "Not created! Please call support"]));
        }
        return $user;
    }
}
