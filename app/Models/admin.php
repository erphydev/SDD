<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $table = 'admin';

    protected $fillable = [
        'name',
        'phonenumber',
        'password',
        'otp',
        'otp_expiry',
        'login_expiry',
        'role',
    ];

    protected $hidden = [
        'password',
        'otp',
        'remember_token',
    ];

    protected $casts = [
        'otp_expiry' => 'datetime',
        'login_expiry' => 'datetime',
        'password' => 'hashed',
    ];
}
