<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $guarded = [];

    const PRICE = 0.36;

    public function getStatus()
    {
        $status = "";
        if ($this->status == 0){
            $status = "Отправлено";
        } elseif($this->status == 1) {
            $status = "Доставлено";
        } elseif($this->status == 2) {
            $status = "Недоставляемое";
        } elseif($this->status == 3) {
            $status = "Прострочено";
        }
        return $status;
    }

    public static function validatePart($text)
    {
        $part = 0;
        if (strlen($text) < 70){
            $part = 1;
        }elseif(strlen($text) > 70 && strlen($text) < 134){
            $part = 2;
        }elseif(strlen($text) > 134 && strlen($text) < 201){
            $part = 3;
        }elseif(strlen($text) > 201 && strlen($text) < 268){
            $part = 4;
        }else{
            return $part = 0;
        }
        return $part;
    }

    public static function validatePartCount($count)
    {
        $part = 0;
        if ($count < 70){
            $part = 1;
        }elseif($count > 70 && $count < 134){
            $part = 2;
        }elseif($count > 134 && $count < 201){
            $part = 3;
        }elseif($count > 201 && $count < 268){
            $part = 4;
        }else{
            return $part = 0;
        }
        return $part;
    }

    public function getShortMessageAttribute()
    {
        $fullText = $this->text;
        return substr($fullText, 0, 10) . ' ........';
    }
}
