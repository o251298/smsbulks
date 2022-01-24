<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    public function index()
    {
        $balances = Auth::user()->balance();
        return view('cabinet.balance-list', [
            'balances' => $balances->get()
        ]);
    }

    public function create()
    {
        $users = User::all();
        return view('cabinet.balance', [
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $balance = Balance::create([
            'user_id' => !$request->user_id ? Auth::id() : $request->user_id,
            'description' => $request->description,
            'payment_id' => !$request->payment_id ? 0 : $request->payment_id,
            'total_sum' => $request->total_sum,
            'current_sum' => $request->total_sum,
            'end_balance' => Carbon::now(),
        ]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $balance = Balance::findOrFail($id);
        $balance->delete();
        return redirect()->back();
    }
}
