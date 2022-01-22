<?php

namespace App\Http\Controllers;

use App\Services\Payments\InterkassaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function index()
    {
        return view('cabinet.payment');
    }

    public function interkassa()
    {
        return view('cabinet.interkassa.form');
    }

    public function proccess()
    {
        Log::channel('payment')->info('proccess');
        Log::channel('payment')->info($_POST);
        $dataSet = $_POST;
        if (empty($dataSet)){
            Log::info('Post is empty @Oleg');
            die();
        } else {
            $inv = new InterkassaService($dataSet);
            $inv->save();
        }
    }
    public function success()
    {
        echo 'success';
    }
    public function error()
    {
        echo 'error';
    }
}
