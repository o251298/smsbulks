<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        Auth::user()->getBalance();
        $payments = Payment::all();
        return view('admin.payments.index', [
            'payments' => $payments
        ]);
    }
}
