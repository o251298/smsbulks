<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Balance;
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
        return view('cabinet.balance');
    }

    public function store(Request $request)
    {
        $balance = Balance::create([
            'user_id' => Auth::id(),
            'description' => $request->description,
            'total_sum' => $request->total_sum,
            'current_sum' => $request->total_sum,
            'end_balance' => Carbon::now(),
        ]);
        return view('cabinet.balance');
    }

    public function destroy($id)
    {
        $balance = Balance::findOrFail($id);
        $balance->delete();
        return redirect()->back();
    }
}
