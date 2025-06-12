<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = ['comprador_id', 'morada_id', 'cartao_id', 'total', 'status'];

    public function produtos()
    {
        return $this->hasMany(CompraProduto::class);
    }

    public function comprador()
    {
        return $this->belongsTo(User::class, 'comprador_id');
    }

    public function morada()
    {
        return $this->belongsTo(Morada::class);
    }

    public function cartao()
    {
        return $this->belongsTo(PaymentMethod::class, 'cartao_id');
    }
}
