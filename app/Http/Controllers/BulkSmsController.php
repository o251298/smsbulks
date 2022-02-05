<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\SendMessage;
use App\Models\Balance;
use App\Models\Group;
use App\Models\Message;
use App\Models\Number;
use App\Services\APISingle;
use App\Http\Requests\SendMessageRequest;
use App\Services\SingleMessage\SendSingle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BulkSmsController extends Controller
{
    protected $token = 'HLxFRtg5YnUyrwuGUUWEd2H3un6CbCVJ';

    public function index()
    {
        $originators = Auth::user()->originators()->where('status', '1');
        $group = Group::query();
        $group = $group->where('user_id', '=',Auth::id());
        return view('cabinet.bulk', [
            'groups' => $group->get(),
            'originators' => $originators
        ]);
    }

    public function store(SendMessageRequest $request)
    {
        $req = array(
            'text' => $request->text,
            'originator' => $request->originator,
            'number' => $request->group
        );

        $group = Group::find($request->group);
        $numbers = $group->numbers();


        $sms = new SendSingle($req, $numbers->count(), null, Auth::id());
        if ($error = $sms->getError()){
            return redirect()->back()->with(array_key_first($error), $error[array_key_first($error)]);
        }
        $sms->payMassage();
        SendMessage::dispatch($numbers, $sms)->onQueue("medium");
        return redirect()->back()->with('success_single_sms', 'Смс ушпешно отправлено');
    }



    public function coastBulk(Request $request)
    {
        $mess_leng = $request->message_leng;
        $group_id = $request->group_id;
        $group = Group::find($group_id);
        $numbers = $group->numbers();
        $numbers_count = $numbers->count();

        $part = Message::validatePartCount($mess_leng);
        if ($part == 0){
            $error = [
                'error' => 'Мало частей'
            ];
            return response()->json($error);
        }

        $pay = 0.36 * $part;
        $pay = $pay * $numbers_count;

        $test = [
          'pay' => $pay,
          'number' => $numbers_count,
          'part' => $part,
        ];



        //{apiKey: 'asda', modelName: 'Address', calledMethod: 'searchSettlements'}
        return response()->json($test);
    }
}
