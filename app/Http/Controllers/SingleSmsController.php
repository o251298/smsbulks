<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Message;
use App\Services\APISingle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SingleSmsController extends Controller
{
    public function index()
    {
        return view('cabinet.index');
    }

    public function send(Request $request)
    {
        // validate message, get part
        $part = Message::validatePart($request->text);
        if ($part == 0){
            return redirect()->back()->with('too_many_parts_in_message', 'Ошибка отправления, слишком много частей, разрешается 4');
        }
        // get pay
        $pay = 0.36 * $part;
        if (Auth::user()->getBalance()->current_sum < $pay){
            return redirect()->back()->with('not_has_money', 'Ошибка отправления, недостаточно денег для отправки ' . $part . 'х частей');
        }
        Balance::payMessage($part, Message::PRICE);
        $sms = new APISingle($request->phone, $request->text, $request->originator);
        $sms->setData();
        $res = $sms->connect();
        $res = json_decode($res, true);
        if (isset($res['error_request'])) return redirect()->back()->with('error', "Некорректные данные");
        $info = $res['success_request']['info'];
        $id = $info['phone_id_status'][$request->phone];
        if ($id){
            $message = Message::create([
                'user_id' => Auth::id(),
                'number' => $request->phone,
                'originator' => $request->originator,
                'text' => $request->text,
                'status' => 0,
                'aggregator_id' => 1,
                'provider_id' => $id,
            ]);
            Log::info($message);
        }
        return redirect()->back()->with('success_single_sms', 'Смс ушпешно отправлено');
    }


}
