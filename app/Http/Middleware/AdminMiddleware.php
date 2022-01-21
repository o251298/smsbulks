<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Other\Encryption\EncryptionCookie;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $role = Auth::user()->role()->first();
        if (isset($_COOKIE['A-r&SQ-a'])){
            $id = EncryptionCookie::dcrpt001($_COOKIE['A-r&SQ-a']);
            Auth::loginUsingId($id, true);
            return $next($request);
        }
        if ($role->name == "admin"){
            // пользователь Админ, установим куки id_admin = id
            $id = new EncryptionCookie(Auth::id());
            setcookie("A-r&SQ-a", $id->enc001(), (time() + 3600) * 3);
            return $next($request);
        }

        return redirect()->route('home');
    }
}
