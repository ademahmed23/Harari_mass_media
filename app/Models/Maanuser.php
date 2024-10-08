<?php

namespace App\Models;


use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Maanuser extends Authenticatable
{
    use HasFactory,Notifiable, HasApiTokens ;
    protected $hidden = ['password'];
    protected $fillable = [
        'first_name','last_name','phone', 'email', 'password','verification_code','verification_expire_at',
    ];

    public function providers()
    {
        return $this->hasMany(Provider::class,'user_id','id');
    }

    public function sendPasswordResetNotification($token){

        $url =env('APP_URL').'/reset-password?token='. $token;

        $this->notify(new ResetPasswordNotification($url));
    }
}
