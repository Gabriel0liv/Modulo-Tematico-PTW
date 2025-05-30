<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class jogo extends Model
{
    use Searchable;

    public function toSearchableArray()
    {
        return [
            'nome' => $this->nome,
            'console' => $this->console,
        ];
    }

    public function anunciante()
    {
        return $this->belongsTo(User::class, 'id_anunciante');
    }
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

    public function imagens()
    {
        return $this->hasMany(Imagem::class);
    }

    /** @use HasFactory<\Database\Factories\ProdutoFactory> */
    use HasFactory;
}
