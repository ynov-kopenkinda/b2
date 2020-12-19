<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Module extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    // public function eleves()
    // {
    //     return $this->hasMany(Eleve::class);
    // }
    // public function promos(): BelongsToMany
    // {
    //     return $this->belongsToMany(Promo::class);
    // }
}
