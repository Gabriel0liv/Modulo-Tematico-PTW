<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concelho extends Model
{
    protected $fillable = [
        'nome',
        'distrito_id',
    ];

    public function distrito()
    {
        return $this->belongsTo(Distrito::class);
    }

    public function getConcelhos($distritoId)
    {
        $concelhos = Concelho::where('distrito_id', $distritoId)->get();
        return response()->json($concelhos);
    }
}
