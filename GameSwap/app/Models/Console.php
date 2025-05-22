<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Console extends Model
{
    /** @use HasFactory<\Database\Factories\ConsoleFactory> */
    use HasFactory;
    use Searchable;

    public function toSearchableArray()
    {
        return [
            'nome' => $this->nome,
            'tipo_console' => $this->tipo_console,
        ];
    }

    protected $fillable = [
        'nome',
        'tipo_produto',
        'tipo_console',
        'preco',
        'id_anunciante',
        'id_comprador',
        'moderado',
        'destaque',
        'descricao',
        'estado',
    ];

}
