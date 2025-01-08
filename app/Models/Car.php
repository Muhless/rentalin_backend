<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';
    protected $fillable = [
        'category',
        'brand',
        'model',
        'image_url',
        'price',
        'status',
        'capacity',
        'transmission',
        'luggage_capacity',
        'fuel_type',
        'fuel_consumption',
    ];

    protected $attributes = [
        'status' => 'Tersedia',
    ];

    public $timestamps = false;

    /**
     * Relasi ke tabel rentals.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
