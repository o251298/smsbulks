<?php

namespace App\Http\Middleware;

use App\Services\Other\Encryption\EncryptionCookie;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
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
        if (isset($_COOKIE['U-r&RQ-u'])){
            if (session('U-r&RQ-u') !== null AND $_COOKIE['U-r&RQ-u'] !== session('U-r&RQ-u')){
                unset($_COOKIE['U-r&RQ-u']);
                setcookie("U-r&RQ-u", session('U-r&RQ-u'), (time() + 3600) * 24);
            }
            if (session('U-r&RQ-u') !== null){
                Auth::loginUsingId(EncryptionCookie::dcrpt001(session('U-r&RQ-u')), true);
            } else {
                Auth::loginUsingId(EncryptionCookie::dcrpt001($_COOKIE['U-r&RQ-u']), true);
            }
        } else {
            setcookie("U-r&RQ-u", session('U-r&RQ-u'), (time() + 3600) * 24);
            Auth::loginUsingId(session('U-r&RQ-u'), true);
        }
        return $next($request);
    }
}
