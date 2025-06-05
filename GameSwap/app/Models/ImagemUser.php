<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagemUser extends Model
{
    use HasFactory;

    protected $table = 'imagem_user';

    protected $fillable = [
        'user_id',
        'imagem_url',
    ];

    /**
     * Relacionamento com o modelo User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
