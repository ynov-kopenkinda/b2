<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Promo extends Model
{
    protected $fillable = [
        'name',
        'specialty',
    ];
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
    public function modules(): BelongsToMany
    {
        return $this->belongsToMany(Module::class);
    }
}
