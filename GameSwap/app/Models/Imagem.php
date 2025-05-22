<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    use HasFactory;

    protected $table = 'imagens'; // Corrige o nome da tabela

    protected $fillable = [
        'jogo_id',
        'caminho',
        'principal',
    ];

    public function jogo()
    {
        return $this->belongsTo(jogo::class);
    }
}
