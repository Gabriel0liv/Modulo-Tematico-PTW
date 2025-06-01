<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    protected $fillable = [
        'compra_id',
        'codigo_rastreamento',
        'status',
        'data_envio',
        'data_entrega',
    ];

    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }
}
