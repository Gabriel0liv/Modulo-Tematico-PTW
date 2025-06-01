<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagemConsole extends Model
{
    use HasFactory;

    protected $table = 'imagens_consoles';

    protected $fillable = [
        'console_id',
        'path',
    ];

    public function console()
    {
        return $this->belongsTo(Console::class);
    }
}
