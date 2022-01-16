<?php


namespace App\Services\API;


class SetDataMessage
{
    public $message;
    public $originator;
    public $number;

    // Принимает смс с контроллера и отправляет его по АПИ
    public function __construct($message, $originator, $number)
    {
        $this->message = $message;
        $this->originator = $originator;
        $this->number = $number;
    }

    public function data()
    {
        $data_array = [
            'phones' => [$this->number],
            'text' => $this->message,
            'originator' => $this->originator
        ];
        return $data_array;
    }
}
