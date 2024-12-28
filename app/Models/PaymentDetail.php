<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    protected $fillable = ['payment_method_id', 'detail'];
    public $timestamps = false;
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class)->ondelete('cascade');
    }
}
