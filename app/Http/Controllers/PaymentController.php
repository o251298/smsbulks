<?php
namespace App\Http\Controllers;

use App\Models\Payment;
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
        $dataSet = $_POST;
        Log::channel('payment')->info($dataSet);
        unset($dataSet['ik_sign']);
        ksort($dataSet, SORT_STRING);
        array_push($dataSet, '6Wwqa9UJWkNaRQv8');
        $signString = implode(':', $dataSet);
        $sign = base64_encode(hash('sha256', $signString, true));
        if (!empty($dataSet)){
            $pay = Payment::create([
                'user_id' => $dataSet['ik_x_id'],
                'user_email' => $dataSet['ik_x_login'],
                'status' => $dataSet['ik_inv_st'],
                'sum' => $dataSet['ik_am'],
                'currency' => $dataSet['ik_cur'],
                'data_pay' => $dataSet['ik_inv_prc'],
            ]);
            Log::channel('payment')->info($pay);
        }
        Log::channel('payment_success')->info($_POST['ik_x_login'] . " оплатил на сумму " . $_POST['ik_am']);
    }

    public function success()
    {
        return view('cabinet.interkassa.success');
    }

    public function error()
    {
        return view('cabinet.interkassa.error');
    }
}
