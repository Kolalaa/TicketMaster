<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escenari extends Model
{
    //
    protected $fillable = [
        'nom',
        'aforament_maxim',
        'ubicacio',
        'cobert',
        'timestamp'
    ];

    protected $casts = [
        'cobert' => 'boolean',
    ];

    public function concerts(): HasMany
    {
        return $this->hasMany(Concert::class);
    }
    public function escenari(): BelongsTo
    {
        return $this->belongsTo(Escenari::class);
    }


}

