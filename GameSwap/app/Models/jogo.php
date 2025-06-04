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
            'console_nome' => $this->console_id, // Modelo de console
            'categoria_nome' => $this->categoria->nome,
        ];
    }

    public function anunciante()
    {
        return $this->belongsTo(User::class, 'id_anunciante');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function modelo_console()
    {
        return $this->belongsTo(ModeloConsole::class, 'console_id');
    }

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'id_categoria',
        'ativo',
        'estado',
        'moderado',
        'id_anunciante',
        'id_comprador',
        'idiomas',
        'classificacao',
        'regiao',
        'tipo_produto',
        'console_id',
        'morada',
        'destaque',
    ];

    public function imagens()
    {
        return $this->hasMany(Imagem::class);
    }

    public function comprador()
    {
        return $this->belongsTo(User::class, 'id_comprador');
    }


    /** @use HasFactory<\Database\Factories\ProdutoFactory> */
    use HasFactory;
}
