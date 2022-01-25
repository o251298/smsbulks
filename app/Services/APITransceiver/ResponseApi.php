<?php


namespace App\Services\APITransceiver;


class ResponseApi
{
    public $status;
    public $info;

    public function __construct($status, $info)
    {
        $this->status = $status;
        $this->info = $info;
        $this->getStatus();
    }

    public function getStatus()
    {
        $data = [
            'status' => $this->status,
            'info' => $this->info
        ];
        return $data;
    }
}
