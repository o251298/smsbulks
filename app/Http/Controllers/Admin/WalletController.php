<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Payment;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function store(Request $request){
        $balance = Wallet::where('user_id', $request->user_id);
        $wallet = $balance->first();

        $wallet->payWallet($request->total_sum);
        $payment = Payment::find($request->payment_id);
        $payment->status = "paymed";
        $payment->save();

        // пометить данную оплату как зачислена
        return redirect()->back();
    }
}
