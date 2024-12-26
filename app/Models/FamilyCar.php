<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyCar extends Model
{
    use HasFactory;
    protected $table = 'family_cars';
    protected $primaryKey = 'id';

    protected $fillable = [
        'brand',
        'model',
        'icon_path',
        'image_path',
        'kapasitas',
        'transmisi',
        'harga',
    ];

    public $timestamps = true;

    protected $casts = [
        'harga' => 'integer',
    ];

    /**
     * Accessor untuk memformat harga ke dalam format mata uang.
     *
     * @return string
     */
    public function getHargaFormattedAttribute()
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    /**
     * Mutator untuk menyimpan harga dalam format integer.
     *
     * @param mixed $value
     */
    public function setHargaAttribute($value)
    {
        // Menghapus simbol mata uang dan format angka
        $this->attributes['harga'] = (int) preg_replace('/[^0-9]/', '', $value);
    }
}
