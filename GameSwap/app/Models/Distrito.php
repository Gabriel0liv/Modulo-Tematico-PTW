<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    protected $fillable = ['nome'];

    public function concelhos()
    {
        return $this->hasMany(Concelho::class);

    }

}
