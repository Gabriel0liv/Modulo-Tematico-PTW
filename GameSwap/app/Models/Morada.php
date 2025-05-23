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
        $this->attributes['morada'] = $value
            ? Crypt::encryptString($value)
            : null;
    }

    public function getMoradaAttribute($value)
    {
        if (!$value) return null;

        try {
            return Crypt::decryptString($value);
        } catch (\Exception $e) {
            // Loga o erro se quiser (opcional)
            \Log::warning("Falha ao descriptografar morada (ID: {$this->id})");

            // Retorna texto de fallback ou nulo
            return '[morada inválida]';
        }
    }

    public function setCodigoPostalAttribute($value)
    {
        $this->attributes['codigo_postal'] = $value
            ? Crypt::encryptString($value)
            : null;
    }

    public function getCodigoPostalAttribute($value)
    {
        if (!$value) return null;

        try {
            return Crypt::decryptString($value);
        } catch (\Exception $e) {
            \Log::warning("Falha ao descriptografar código postal (ID: {$this->id})");

            return '[código postal inválido]';
        }
    }
}
