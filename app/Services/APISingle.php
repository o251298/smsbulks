<?php


namespace App\Services;


use Illuminate\Support\Facades\Log;

class APISingle
{
    protected $token = 'HLxFRtg5YnUyrwuGUUWEd2H3un6CbCVJ';
    protected $url = 'https://api.acemountmedia.com/sms-v2/send';
    public $phone;
    public $massage;
    public $origanator;

    public function __construct($phone, $massage, $origanator)
    {
        $this->phone = $phone;
        $this->massage = $massage;
        $this->origanator = $origanator;
    }

    public function setData()
    {
        $data = array();
        $data_array = [
            'phones' => [$this->phone],
            'text' => $this->massage,
            'originator' => $this->origanator
        ];
        $data = json_encode($data_array);
        Log::info($data);
        return $data;
    }

    public function getResult($res){
        return $res;
    }

    public function connect()
    {
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $this->url,
            CURLOPT_POSTFIELDS => $this->setData(),
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $this->token,
                'Content-Type: application/json'
            ]
        ]);
        $result = curl_exec($ch);
        $res = $result;
        Log::info($res);
        curl_close($ch);
        return $res;
    }


}
