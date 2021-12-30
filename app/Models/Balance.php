<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Balance extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public static function payMessage($part, $price)
    {
        $balance = self::find(Auth::user()->getBalance()->id);
        $priceForMessage = (float) $part * (float) $price;
        $balance->current_sum = $balance->current_sum - $priceForMessage;
        $balance->save();
    }
}
