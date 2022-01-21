<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Message;
use App\Models\Originator;
use App\Services\API\SetDataMessage;
use App\Services\APISingle;
use App\Services\SingleMessage\SendSingle;
use App\Http\Requests\SendMessageRequest;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SingleSmsController extends Controller
{
    // контролер должен выводить информация и принимать информацию, сама логика должна быть в СЕРВИСЕ!!!
    public function index()
    {
        $originators = Auth::user()->originators()->where('status', '1');
        return view('cabinet.index', [
            'originators' => $originators
        ]);
    }

    public function send(SendMessageRequest $request)
    {
        $sms = new SendSingle($request);
        if ($error = $sms->getError()){
            return redirect()->back()->with(array_key_first($error), $error[array_key_first($error)]);
        }
        $sms->payMassage();
        $status = $sms->sendMessage($request->phone);
        if (array_key_exists('success_request', $status)){
            return redirect()->back()->with('success_single_sms', 'Смс ушпешно отправлено');
        } else {
            return redirect()->back()->with('error', $status[array_key_first($status)]);
        }
    }
}
