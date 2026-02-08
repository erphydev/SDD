<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'surename',
        'phonenumber',
        'email',
        'otp',
        'otp_expiry',
        'login_expiry',
        'coach_id',
    ];

    protected $hidden = [
        'otp',
    ];

    protected $casts = [
        'otp_expiry' => 'datetime',
        'login_expiry' => 'datetime',
    ];

    public function coach()
    {
        return $this->belongsTo(Coach::class, 'coach_id');
    }
}
