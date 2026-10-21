<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    protected $fillable = [
        'nom',
        'pais',
        'bio',
        'imatge_url',
        'actiu',
    ];

    protected $casts = [
        'actiu' => 'boolean',
    ];

    public function concerts(): HasMany
    {
        return $this->hasMany(Concert::class);
    }
}
