<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'name',
        'address',
        'city',
        'postal_code',
        'website',
        'description',
        'food_type',
        'state',
    ];
}
