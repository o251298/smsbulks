<?php


namespace App\Interfaces\API\SendMessage;


interface CheckRequest
{
    public function checkSuccess();
    public function checkError();
}
