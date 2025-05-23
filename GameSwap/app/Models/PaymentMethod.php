<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable = [
        'nome_cartao',
        'user_id',
        'stripe_payment_method_id',
        'is_default',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
