<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompraProduto extends Model
{
    protected $fillable = ['compra_id', 'produto_id', 'tipo_produto', 'vendedor_id', 'quantidade', 'preco_unitario'];

    public function compra()
    {
        return $this->belongsTo(\App\Models\Compra::class);
    }

    public function vendedor()
    {
        return $this->belongsTo(\App\Models\User::class, 'vendedor_id');
    }

    public function produto()
    {
        if ($this->tipo_produto === 'jogo') {
            return \App\Models\Jogo::find($this->produto_id);
        }

        if ($this->tipo_produto === 'console') {
            return \App\Models\Console::find($this->produto_id);
        }

        return null;
    }
}
