<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Group;
use App\Models\Message;
use App\Models\Number;
use App\Services\APISingle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BulkSmsController extends Controller
{
    protected $token = 'HLxFRtg5YnUyrwuGUUWEd2H3un6CbCVJ';
    public function send()
    {
        $data = array();
        $data_array = [
            'phones' => [$this->phone],
            'text' => $this->massage,
            'originator' => $this->origanator
        ];
        $data = json_encode($data_array);

        $arr = ["380508047845", "380635661329", "380962540183", "380504047845", "380508046845", "380501047845", "380508047846"];
        while(count($arr) != 0){
            if(count($arr) > 5){
                echo 'many request' . '<br>';
                $req = array_splice($arr, 0, 5);
                $arr = array_diff($arr, $req);
                var_dump($req);
                sleep(0.9);
                echo '<hr>' . '<br>';





                //var_dump($arr);
                //echo '<hr>' . '<br>';
            } else {
                echo 'one request' . '<br>';
                $req = $arr;
                var_dump($arr);
                echo '<hr>' . '<br>';
                $arr = [];





            }
        }



        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $this->url,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $this->token,
                'Content-Type: application/json'
            ]
        ]);
        $result = curl_exec($ch);
        $res = $result;
        curl_close($ch);
        dump($res);
        dd();
    }

    public function index()
    {
        $group = Group::query();
        $group = $group->where('user_id', '=',Auth::id());
        return view('cabinet.bulk', [
            'groups' => $group->get()
        ]);
    }

    public function store(Request $request)
    {
        $group = Group::find($request->group);
        $numbers = $group->numbers();
        $numbers_count = $numbers->count();

        // validate message, get part
        $part = Message::validatePart($request->text);
        if ($part == 0){
            return redirect()->back()->with('too_many_parts_in_message', 'Ошибка отправления, слишком много частей, разрешается 4');
        }

        $pay = 0.36 * $part * $numbers_count;
        if (Auth::user()->getBalance()->current_sum < $pay){
            return redirect()->back()->with('not_has_money', 'Ошибка отправления, недостаточно денег для отправки ' . $part . 'х частей');
        }
        Balance::payMessage($part * $numbers_count, Message::PRICE);

        $text = (string) $request->text;
        $i = 1;
        foreach ($numbers->get() as $item){
            if ($i % 9 == 0){
                sleep(1);
            }
            $sms = new APISingle($item->number, $text, $request->originator);
            $sms->setData();
            $res = $sms->connect();
            $res = json_decode($res, true);
            Log::info($res);
            if (isset($res['error_request'])) return redirect()->back()->with('error', "Некорректные данные");
            $info = $res['success_request']['info'];
            $id = $info['phone_id_status'][$item->number];
            if ($id){
                $message = Message::create([
                    'user_id' => Auth::id(),
                    'number' => $item->number,
                    'originator' => $request->originator,
                    'text' => $text,
                    'status' => 0,
                    'aggregator_id' => 1,
                    'provider_id' => $id,
                ]);
                Log::info($message);
            }
        }
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
