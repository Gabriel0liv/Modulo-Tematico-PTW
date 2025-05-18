<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Console extends Model
{
    /** @use HasFactory<\Database\Factories\ConsoleFactory> */
    use HasFactory;

    protected $fillable = [
        'nome',
        'tipo_produto',
        'tipo_console',
        'id_anunciante',
        'id_comprador',
        'classificacao',
        'moderado',
        'destaque',
        'descricao',
        'preco',
    ];

}
