<?php


namespace App\Services;


class APIBulk
{
    protected $token = 'HLxFRtg5YnUyrwuGUUWEd2H3un6CbCVJ';
    protected $url = 'http://api.acemountmedia.com/sms-v2/send';
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
        curl_close($ch);
        return $res;
    }


}
