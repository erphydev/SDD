<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;


    protected $table = 'coachs';

    protected $fillable = [
        'name',
        'phone',
        'job',
        'address',
        'status', // active, inactive
    ];


    public function users()
    {
        return $this->hasMany(User::class, 'coach_id');
    }
}
