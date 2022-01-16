<?php


namespace App\Services\SingleMessage;


use App\Models\Message;
use Illuminate\Support\Facades\Log;

class ParseRequest
{
    public $data;
    public $message;
    public $id;
    public $message_data;

    public function __construct($data, $message)
    {
        $this->data = $data;
        $this->message = $message;
        $this->parseMessage();
        $this->parseData();
        $this->save();
    }

    public function parseData()
    {
        $arr = (array) $this->data;
        $result = $arr["result"];
        $info = $result['success_request']['info'];
        $id = $info['phone_id_status'][$this->message_data['phones'][0]];
        $this->id = $id;
    }

    public function parseMessage()
    {
        $message = json_decode($this->message, true);
        $this->message_data = $message;
    }

    public function save()
    {
        Message::create([

        ]);
        Log::info($this->id);
        Log::info($this->message_data['phones'][0]);
        Log::info($this->message_data['text']);
        Log::info($this->message_data['originator']);
    }

}
