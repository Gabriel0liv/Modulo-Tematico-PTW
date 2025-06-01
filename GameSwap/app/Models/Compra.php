<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = ['comprador_id', 'morada_id', 'cartao_id', 'total', 'status'];

    public function produtos()
    {
        return $this->hasMany(\App\Models\CompraProduto::class);
    }

    public function comprador()
    {
        return $this->belongsTo(\App\Models\User::class, 'comprador_id');
    }

    public function morada()
    {
        return $this->belongsTo(\App\Models\Morada::class);
    }

    public function cartao()
    {
        return $this->belongsTo(\App\Models\PaymentMethod::class, 'cartao_id');
    }
}
