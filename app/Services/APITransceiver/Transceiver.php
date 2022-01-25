<?php


namespace App\Services\APITransceiver;


use App\Services\SingleMessage\SendSingle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Transceiver
{
    public $request;
    public $response;

    public function __construct($request)
    {
        $this->request = $request;
        $this->send();
    }

    public function send()
    {
        if (!$this->request->text || !$this->request->phone || !$this->request->originator)
        {
            throw new \Exception(json_encode(['data' => 'Please submit only "originator", "text", "phone"']));
        }
        $sms = new SendSingle($this->request);
        if ($error = $sms->getError()){
            Log::info($error[array_key_first($error)]);
            throw new \Exception(json_encode($error[array_key_first($error)]));
        }
        $sms->payMassage();
        $status = $sms->sendMessage($this->request->phone);
        if (array_key_exists('success_request', $status)){
            $data = ['message_id' => $sms->messageId, 'current_balance' => Auth::user()->getWallet()->first()['current_sum']];
            $this->response = json_encode($data);
        } else {
            throw new \Exception(json_encode($status[array_key_first($status)]));
        }
    }
}
