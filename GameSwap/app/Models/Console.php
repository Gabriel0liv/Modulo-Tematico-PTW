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
            'modelo_console_nome' => $this->modelo_console ? $this->modelo_console->nome : null,        ];
    }

    public function anunciante()
    {
        return $this->belongsTo(User::class, 'id_anunciante');
    }

    public function comprador()
    {
        return $this->belongsTo(User::class, 'id_comprador');
    }

    public function modelo_console()
    {
        return $this->belongsTo(ModeloConsole::class, 'modelo_console_id');
    }

    public function show($id)
    {
        $console = \App\Models\Console::with('imagens')->findOrFail($id);
        return view('consoles.show', compact('console'));
    }


    protected $fillable = [
        'nome',
        'tipo_produto',
        'modelo_console_id',
        'preco',
        'id_anunciante',
        'id_comprador',
        'moderado',
        'destaque',
        'descricao',
        'estado',
    ];

    public function imagens()
    {
        return $this->hasMany(\App\Models\ImagemConsole::class, 'console_id');
    }


}
