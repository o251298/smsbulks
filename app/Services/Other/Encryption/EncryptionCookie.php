<?php


namespace App\Services\Other\Encryption;


class EncryptionCookie
{
    protected $id;
    const a_start = 'f';
    const a_end = 'k';
    protected $string = null;
    const x = 5;
    const y = 1209;
    const z = 2 * 9;

    public function __construct($id)
    {
        $this->id = $id;
        $this->setStr();
    }

    public function enc001()
    {
        $integer = ($this->id * self::x + self::y) - self::z;
        $hash = $integer . $this->string . strrev($integer) . strrev($this->string);
        return $hash;
    }

    public function setStr()
    {
        $alphabet = range(self::a_start, self::a_end);
        $i = 1;
        foreach ($alphabet as $item)
        {
            if ($i % 3 == 0){
                $this->string = $this->string . $item  . "#$$";
            } else {
                $this->string = $this->string . $item;
            }
            $i++;
        }
    }

    public static function dcrpt001($str)
    {
        $integer = (integer) $str;
        $id = ($integer - self::y + self::z)/self::x;
        return $id;
    }
}
