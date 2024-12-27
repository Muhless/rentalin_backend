<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable = ['payment_id', 'name'];

    public function payment()
    {
        return $this->belongsTo(Payment::class)->ondelete('cascade');
    }

    public function paymentDetails()
    {
        return $this->hasOne(PaymentDetail::class);
    }
}

