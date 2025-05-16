<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Morada extends Model
{
    protected $fillable = [
        'user_id',
        'morada',
        'codigo_postal',
        'distrito_id',
        'concelho_id',
        'nome_morada',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function distrito() {
        return $this->belongsTo(Distrito::class);
    }

    public function concelho() {
        return $this->belongsTo(Concelho::class);
    }

    public function setMoradaAttribute($value)
    {
        $this->attributes['morada'] = Crypt::encryptString($value);
    }

    public function getMoradaAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    // Mutator para encriptar código postal
    public function setCodigoPostalAttribute($value)
    {
        $this->attributes['codigo_postal'] = Crypt::encryptString($value);
    }

    // Accessor para desencriptar código postal
    public function getCodigoPostalAttribute($value)
    {
        return Crypt::decryptString($value);
    }
}
