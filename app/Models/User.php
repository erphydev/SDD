<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'surename',
        'phonenumber',
        'otp',
        'otp_expiry',
        'login_expiry',
        'email',
        'coach_id',
    ];


    protected $hidden = [
        'otp',
        'remember_token',
    ];


    protected $casts = [
        'otp_expiry' => 'datetime',
        'login_expiry' => 'datetime',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function coach()
    {
        return $this->belongsTo(Coach::class, 'coach_id');
    }
}
