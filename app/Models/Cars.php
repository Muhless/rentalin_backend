<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Cars extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $fillable = [
        'category',
        'brand',
        'model',
        'image_url',
        'capacity',
        'transmission',
        'lunggage_capacity',
        'features',
        'fuel_type',
        'fuel_consumption',
        'price',
        'status',
    ];

    protected $casts = [
        'price' => 'integer',
        'status' => 'integer',
    ];


    // public function getImageUrlAttribute()
    // {

    //     return $this->image_url ? Storage::url($this->image_url) : null;
    // }
}
