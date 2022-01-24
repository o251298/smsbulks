<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Other\Encryption\EncryptionCookie;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', [
            'users' => $users
        ]);
    }
    public function change($id)
    {
        $id_enc = new EncryptionCookie($id);
        $id_enc = $id_enc->enc001();
        setcookie("U-r&RQ-u", $id_enc, (time() + 3600) * 3);
        Auth::loginUsingId($id, true);
        return redirect()->route('home')->with('U-r&RQ-u', $id_enc);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back();
    }
}
