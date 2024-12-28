<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable = ['payment_id', 'name'];
    public $timestamps = false;
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
    public function paymentDetails()
    {
        return $this->hasMany(PaymentDetail::class);
    }
}
