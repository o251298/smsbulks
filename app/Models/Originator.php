<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Originator extends Model
{
    use HasFactory;
    protected $guarded = [];
    const NEW_OR = 0;
    const REGISTER_OR = 1;
    const REJECT_OR = 2;

    public function getStatus()
    {
        $response = array();
        if ($this->status == self::NEW_OR){
            $response = ['status' => 'На модерации', 'label' => 'warning'];
            return $response;
        } elseif ($this->status == self::REGISTER_OR){
            $response = ['status' => 'Активно', 'label' => 'success'];
            return $response;
        } elseif ($this->status == self::REJECT_OR){
            $response = ['status' => 'Отклонено', 'label' => 'danger'];
            return $response;
        }
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'originator_user');
    }
}
