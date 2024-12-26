<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;

    protected $table = 'cars';

    protected $fillable = [
        'category',
        'brand',
        'model',
        'icon_path',
        'image_path',
        'capacity',
        'transmission',
        'price',
        'status',
    ];


    protected $casts = [
        'price' => 'integer',
        'status' => 'integer',
    ];

    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image_path);
    }

    public function getIconUrlAttribute()
    {
        return asset('storage/' . $this->icon_path);
    }
}
