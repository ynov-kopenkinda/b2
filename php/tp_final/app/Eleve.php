<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Eleve extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'email',
        'promo_id',
    ];

    // public function eleves(): BelongsToMany
    // {
    //     return $this->belongsToMany(Module::class);
    // }
    // public function modules()
    // {
    //     return $this->hasMany(Module::class);
    // }
}
