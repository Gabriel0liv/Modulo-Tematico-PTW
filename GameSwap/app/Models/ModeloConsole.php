<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeloConsole extends Model
{
    protected $fillable = [
        'nome',
    ];
    /** @use HasFactory<\Database\Factories\ModeloConsoleFactory> */
    use HasFactory;
}
