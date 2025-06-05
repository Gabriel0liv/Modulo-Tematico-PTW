<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denuncias extends Model
{
    /** @use HasFactory<\Database\Factories\DenunciasFactory> */
    use HasFactory;

    public function denunciante()
    {
        return $this->belongsTo(User::class, 'id_denunciante');
    }

    public function denunciado()
    {
        return $this->belongsTo(User::class, 'id_denunciado');
    }

    protected $fillable = [
        'id_denunciante',
        'id_denunciado',
        'tipo',
        'motivo',
        'status',
        'resolvido_em',
        'data_reativacao',
    ];
}
