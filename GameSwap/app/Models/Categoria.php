<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'nome', // Nome da categoria
    ];

    /** @use HasFactory<\Database\Factories\CategoriaFactory> */
    use HasFactory;
}
