<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function numbers()
    {
        return $this->hasMany(Number::class);
    }
}
