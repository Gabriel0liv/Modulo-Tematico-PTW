<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{

    public function remetente()
    {
        return $this->belongsTo(User::class, 'id_remetente');
    }

    protected $fillable = [
        'conteudo',
        'id_destinatario',
        'id_remetente',
    ];

    /** @use HasFactory<\Database\Factories\ComentarioFactory> */
    use HasFactory;
}
