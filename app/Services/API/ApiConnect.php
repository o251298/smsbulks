<?php


namespace App\Services\API;


use App\Interfaces\API\SendMessage\Connect;
use Illuminate\Support\Facades\Log;

class ApiConnect implements Connect
{
    /**
     * Данный класс устанавливает соединение и возвращает результат
     *
     * @var
     */

    protected $token;
    protected $url;
    protected $data;

    public function __construct($token, $url, $data)
    {
        $this->token = $token;
        $this->url = $url;
        $this->data = $data;
    }

    public function setHeader()
    {
        $headers = [
            'Authorization: Bearer ' . $this->token,
            'Content-Type: application/json'
        ];
        return $headers;
    }

    public function setCurlData()
    {
        $curl_data = [
            CURLOPT_URL => $this->url,
            CURLOPT_POSTFIELDS => $this->data,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $this->setHeader()
        ];
        return $curl_data;
    }

    public function connect()
    {
        $ch = curl_init();
        // init connect
        curl_setopt_array($ch, $this->setCurlData());
        $result = curl_exec($ch);
        $res = $result;

        Log::info($res);
        curl_close($ch);
        $res = json_decode($res, true);
        return $res;
    }

}
