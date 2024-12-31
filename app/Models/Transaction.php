<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'users',
        'cars',
        'rent_date',
        'return_date',
        'rent_duration',
        'payment',
        'total',
        'status',
    ];

    protected $casts = [
        'rent_date' => 'date',
        'return_date' => 'date',
        'rent_duration' => 'integer',
        'total' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users', 'id');
    }
    public function car()
    {
        return $this->belongsTo(Cars::class, 'cars', 'id'); 
    }
}
