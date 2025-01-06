<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika tidak sesuai dengan plural dari model
    protected $table = 'cars';

    // Menentukan kolom yang boleh diisi (mass assignable)
    protected $fillable = [
        'category',
        'brand',
        'model',
        'image_url',
        'price',
        'status',
        'feature_id',
    ];

    public function feature()
    {
        return $this->belongsTo(Feature::class, 'feature_id');
    }
}
