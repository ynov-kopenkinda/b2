<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Promo extends Model
{
    protected $fillable = [
        'name'  ,
        'specialty',
    ];
    // public function eleves(): HasMany
    // {
    //     return $this->hasMany(Eleve::class);
    // }
    // public function modules(): HasMany
    // {
    //     return $this->hasMany(Module::class);
    // }
}
