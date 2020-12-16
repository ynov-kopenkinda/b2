<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Livreur;
use Faker\Generator as Faker;

$factory->define(Livreur::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'vehicle' => $faker->postcode,
    ];
});
