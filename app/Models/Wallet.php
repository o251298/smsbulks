<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Wallet extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function payWallet($sum)
    {
        $sum = (float) $sum;
        $current = $this->current_sum;
        $this->current_sum = $current + $sum;
        return $this->save();
    }
    
    public static function payMessage($part, $price)
    {
        /*
         * получить текущий кошилек
         * Отнять сумму
         * Сохранить текущее значение
         */
        $wallet = self::where('user_id', Auth::id());
        $wallet = $wallet->first();
        $priceForMessage = (float) $part * (float) $price;
        $wallet->current_sum = $wallet->current_sum - $priceForMessage;
        $wallet->save();
    }
}
