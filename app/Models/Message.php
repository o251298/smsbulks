<?php

namespace App\Models;

use App\Services\Other\DB\DataBase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    use HasFactory;
    protected $guarded = [];

    const PRICE = 0.50;

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

    public static function SuccessMessageToday()
    {
        $db = DataBase::getConnection();
        $sql = "SELECT COUNT(id) as count FROM messages
                WHERE user_id =" . Auth::id() . " AND DATE(created_at) = DATE(NOW()) AND status = 1" ;
        $result = $db->prepare($sql);
        $result->execute();
        $count = $result->fetch();
        return $count['count'];
    }
    public static function UnsuccessfulMessageToday()
    {
        $db = DataBase::getConnection();
        $sql = "SELECT COUNT(id) as count FROM messages
                WHERE user_id =" . Auth::id() . " AND DATE(created_at) = DATE(NOW()) AND status = 0" ;
        $result = $db->prepare($sql);
        $result->execute();
        $count = $result->fetch();
        return $count['count'];
    }
    public static function SuccessMessageMonth()
    {
        $db = DataBase::getConnection();
        $sql = "SELECT COUNT(id) as count FROM messages
                WHERE user_id =" . Auth::id() . " AND YEAR(created_at) = YEAR(NOW()) AND MONTH(created_at) = MONTH(NOW()) AND status = 1";
        $result = $db->prepare($sql);
        $result->execute();
        $count = $result->fetch();
        return $count['count'];
    }
    public static function UnsuccessfulMessageMonth()
    {
        $db = DataBase::getConnection();
        $sql = "SELECT COUNT(id) as count FROM messages
                WHERE user_id =" . Auth::id() . " AND YEAR(created_at) = YEAR(NOW()) AND MONTH(created_at) = MONTH(NOW()) AND (status = 0 OR status = 2)";
        $result = $db->prepare($sql);
        $result->execute();
        $count = $result->fetch();
        return $count['count'];
    }
    public static function SentMessageMonth()
    {
        $db = DataBase::getConnection();
        $sql = "SELECT COUNT(id) as count FROM messages
                WHERE user_id=" . Auth::id() . " AND YEAR(created_at) = YEAR(NOW()) AND MONTH(created_at) = MONTH(NOW())";
        $result = $db->prepare($sql);
        $result->execute();
        $count = $result->fetch();
        return $count['count'];
    }



    public static function GetConversionForMonth()
    {
        /*
         * S*100/K.
         *  S – количество продаж за определенный период времени;
         *  K – общее количество клиентов за определенный период времени
         */
        $success = self::SuccessMessageMonth();
        $all = self::SentMessageMonth();
        if ($all == 0){
            $all = 100;
        }
        $conversion = $success * 100/$all;
        return round($conversion, 2);
    }
}
