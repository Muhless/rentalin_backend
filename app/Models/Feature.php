<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    // Menentukan nama tabel
    protected $table = 'features';

    // Menentukan kolom yang boleh diisi
    protected $fillable = [
        'capacity',
        'transmission',
        'luggage_capacity',
        'fuel_type',
        'fuel_consumption',
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
