<?php


namespace App\Services\Payments;


use Illuminate\Support\Facades\Log;

class InterkassaService
{
    protected $test_key = '6Wwqa9UJWkNaRQv8';
    protected $secret_key = 'jRHB39qwt39vQ6Fj';
    protected $ik_id = '61e9731eeaa2517dd276a598';
    protected $dataSet;
    protected $sign;
    protected $sin_t;

    public function __construct($dataSet)
    {
        $this->dataSet = $dataSet;
        $this->pay();
        $this->check();
    }

    public function pay()
    {
        $this->sin_t = $this->dataSet['ik_sign'];
        unset($this->dataSet['ik_sign']);
        ksort($dataSet, SORT_STRING);
        array_push($dataSet, $this->test_key);
        $signString = implode(':', $dataSet);
        $sign = base64_encode(hash('sha256', $signString, true));
        Log::info($sign);
        $this->sign = $sign;
    }

    public function check()
    {
        if ($this->dataSet['ik_co_id'] != $this->ik_id || $this->dataSet['ik_inv_st'] != 'success' || $this->sign != $this->sin_t){
            return false;
        }
        return true;
    }

    public function save()
    {
        if ($this->check()){
            Log::info('success');
            Log::info($this->dataSet['ik_am']);
        } else {
            Log::info('error pay');
        }
    }
}
