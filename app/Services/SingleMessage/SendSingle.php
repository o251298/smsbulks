<?php


namespace App\Services\SingleMessage;
use App\Models\Balance;
use App\Models\Message;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use App\Services\API\SetDataMessage;
use App\Services\API\APITransceiver;
use Illuminate\Support\Facades\Request;

class SendSingle
{
    public $request;
    public $error = false;
    public $bulk = null;
    public $part;
    public $pay;
    public $response;
    public $messageId = 0;

    public function __construct($request, $bulk = null)
    {
        $this->request = $request;
        $this->validatePart();
        if ($bulk !== null){
            $this->bulk = $bulk;
            $this->payBulk();
        } else {
            $this->pay();
        }
    }

    public function validatePart()
    {
        $part = Message::validatePart($this->request->text);
        if ($part == 0){
            $this->error = [
                'too_many_parts_in_message' => 'Ошибка отправления, слишком много частей, разрешается 4'
            ];
            return $this->error;
        }
        $this->part = $part;
        return true;
    }

    public function pay()
    {
        $pay = 0.36 * $this->part;
        if (Auth::user()->getBalance()->current_sum < $pay){
            $this->error = [
                'not_has_money' => 'Ошибка отправления, недостаточно денег для отправки ' . $this->part . 'х частей'
            ];
            return $this->error;
        }
        $this->pay = $pay;
        return  true;
    }

    public function payBulk()
    {
        $pay = 0.36 * $this->part * $this->bulk;
        if (Auth::user()->getBalance()->current_sum < $pay){
            $this->error = [
                'not_has_money' => 'Ошибка отправления, недостаточно денег для отправки ' . $this->part . 'х частей'
            ];
            return $this->error;
        }
        $this->pay = $pay;
        return  true;
    }

    public function getError()
    {
        return $this->error;
    }

    public function payMassage()
    {
        if ($this->getError()){
            dump('false');
            return false;
        }
        //Balance::payMessage($this->part, Message::PRICE);
        Wallet::payMessage($this->part, Message::PRICE);
        return true;
    }

    public function sendMessage($phone)
    {
            $data = new SetDataMessage($this->request->text, $this->request->originator, $phone);
            $transceiver = new APITransceiver($data->data(), $this->dataConnect());
            $this->response = $transceiver->checkResponse();

            if (array_key_exists('success_request', $this->response)){
                $res = $this->response['success_request'];
                $test = $res['info']['phone_id_status'];
                $message = Message::create([
                    'user_id' => Auth::id(),
                    'number' => $phone,
                    'originator' => $this->request->originator,
                    'text' => $this->request->text,
                    'status' => 0,
                    'aggregator_id' => 1,
                    'provider_id' => $test[$phone],
                ]);
                // for API request
                $this->messageId = $message->id;
                return $transceiver->checkResponse();
            }
            return $transceiver->checkResponse();
    }

    public function dataConnect(){
        $data = [
            'url' => 'http://api.acemountmedia.com/sms-v2/send',
            'token' => 'EevnBT8XkJe2spKz9QTb1suUlrjcDytT'
        ];
        return $data;
    }



}
