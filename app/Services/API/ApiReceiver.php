<?php


namespace App\Services\API;


use App\Interfaces\API\SendMessage\CheckRequest;
use Illuminate\Support\Facades\Log;

class ApiReceiver implements CheckRequest
{
    public $result;
    public function __construct($result)
    {
        $this->result = $result;
    }

    public function checkSuccess()
    {
        if (array_key_exists('success_request', $this->result) || array_key_exists('successful_request', $this->result))
        {
            Log::info($this->result);
            Log::info('success_request');
            return $this->result;
        } else {
            return null;
        }
    }
    public function checkError()
    {
        if (array_key_exists('error_request', $this->result))
        {
            Log::info($this->result);
            Log::info('error_request');
            return $this->result;
        } else {
            return null;
        }

    }
}
