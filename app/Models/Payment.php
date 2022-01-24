<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


///INSERT INTO payments SET user_id=8, user_email="test", status="success", sum=10.00, currency="UAH", data_pay=NOW(), created_at=NOW(), wallet_id=1;
class Payment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function balance()
    {
        return $this->hasOne(Balance::class, 'payment_id', 'id');
    }

    public function wallet()
    {
        return $this->hasOneThrough(Wallet::class, User::class, 'id', 'user_id', 'user_id');
    }

    public function getStatus()
    {
        $result = array();
        if ($this->status == "success"){
            $result = ['status' => 'success', 'lable' => 'success'];
        } elseif ($this->status == "paymed") {
            $result = ['status' => 'paymed', 'lable' => 'success'];
        }else{
            $result = ['status' => 'error', 'lable' => 'danger'];
        }
        return $result;
    }
}
