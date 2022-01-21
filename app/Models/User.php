<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    const AdminENCR = 'A-r&SQ-a';
    const UserENCR = 'U-r&RQ-u';
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function balance()
    {
        return $this->hasMany(Balance::class);
    }

    public function getBalance()
    {
        $balance = $this->balance()->first();
        return $balance;
    }

    public function checkUpSendSms()
    {
        if (!$this->getBalance()){
            return false;
        }
        if ($this->getBalance()->current_sum < Message::PRICE){
            return false;
        } else {
            return true;
        }
    }
    public function role()
    {
       // return $this->hasManyThrough(Role::class, RolesUsers::class, 'role_id', 'id', 'user_id');
        return $this->belongsToMany(Role::class, 'roles_users');
    }

    public function originators()
    {
        return $this->belongsToMany(Originator::class, 'originator_user');
    }
}
