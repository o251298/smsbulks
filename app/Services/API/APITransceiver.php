<?php


namespace App\Services\API;
use App\Services\API\ApiConnect;
use App\Services\API\ApiReceiver;

class APITransceiver
{
    public $token = 'EevnBT8XkJe2spKz9QTb1suUlrjcDytT';
    public $url = 'http://api.acemountmedia.com/sms-v2/send';
    public $url_status = 'http://api.acemountmedia.com/sms/status';
    public $res;
    /*
     * Принимает массив данных для смс
     * Отпределяем куда смс будут идти (Если укр - на смс клаб, если другие - другой сервис)
     * Устанавливает токен, юрл
     * Вызывает отправку, сохранение в базу
     * возможно это будет родительский клас, так как определение пути и сохранение в бд нужно для массовых и одиночных смс
     *
     */
    public $data;
    public $connect;

    public function __construct($data, $connect)
    {
        $this->data = json_encode($data);
        $this->connect = $connect;
        $this->res = $this->send();
    }

    public function send()
    {
        $api = new ApiConnect($this->connect['token'], $this->connect['url'], $this->data);
        $connect = $api->connect();
        $receiver = new ApiReceiver($connect);
        return $receiver;
    }

    public function checkResponse()
    {
        if ($this->res->checkSuccess()){
            return $this->res->checkSuccess();
        } elseif ($this->res->checkError()){
            // - log
            return $this->res->checkError();
        } else {
            return null;
        }
    }
}
