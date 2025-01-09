<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $table = 'rentals';
    protected $fillable = [
        'user_id',
        'car_id',
        'rent_date',
        'return_date',
        'rent_duration',
        'driver',
        'total',
        'status'
    ];

    protected $attributes = [
        'status' => 'Menunggu persetujuan',
    ];

    protected $casts = [
        'rent_date' => 'datetime',
        'return_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
