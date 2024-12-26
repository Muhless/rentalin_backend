<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relasi one to many ke payment_details
    public function details()
    {
        return $this->hasMany(PaymentDetail::class);
    }
}
