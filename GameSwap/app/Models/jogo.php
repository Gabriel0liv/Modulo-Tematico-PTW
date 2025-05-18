<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jogo extends Model
{

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'id_categoria',
        'estado',
        'moderado',
        'id_anunciante',
        'id_comprador',
        'idiomas',
        'classificacao',
        'regiao',
        'tipo_produto',
        'console',
        'morada',
        'destaque',
    ];


    /** @use HasFactory<\Database\Factories\ProdutoFactory> */
    use HasFactory;
}
