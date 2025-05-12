<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Morada extends Model
{
    protected $fillable = [
        'user_id',
        'morada',
        'codigo_postal',
        'distrito',
        'localidade',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
