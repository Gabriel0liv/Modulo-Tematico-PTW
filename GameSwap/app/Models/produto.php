<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produto extends Model
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
        'desenvolvedor',
        'publicador',
        'ano_lancamento',
        'idiomas',
        'classificacao',
        'regiao',
        'tipo_produto',
        'console',
        'morada'
    ];


    /** @use HasFactory<\Database\Factories\ProdutoFactory> */
    use HasFactory;
}
