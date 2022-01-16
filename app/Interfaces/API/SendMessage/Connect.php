<?php


namespace App\Interfaces\API\SendMessage;


interface Connect
{
    public function setHeader();
    public function connect();
    public function setCurlData();
}
