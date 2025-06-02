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

    public function anunciante()
    {
        return $this->belongsTo(User::class, 'id_anunciante');
    }

    public function comprador()
    {
        return $this->belongsTo(User::class, 'id_comprador');
    }

    public function show($id)
    {
        $console = \App\Models\Console::with('imagens')->findOrFail($id);
        return view('consoles.show', compact('console'));
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

    public function imagens()
    {
        return $this->hasMany(\App\Models\ImagemConsole::class, 'console_id');
    }


}
