<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Reports extends Controller
{
    public function index()
    {
        $messages = Message::all();
        $messages = $messages->where('user_id', Auth::id());
        return view('cabinet.reports.index', [
            'messages' => $messages
        ]);
    }
}
