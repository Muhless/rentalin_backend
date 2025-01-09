<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens; //jangan sampai ke hapus

    protected $fillable = [
        'username',
        'phone',
        'password',
    ];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
