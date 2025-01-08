<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'rental_id',
        'actual_return_date',
        'late_days',
        'penalty_fee',
        'total',
        'status',
    ];

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }
}
