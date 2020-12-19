<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Promo;
use Faker\Generator as Faker;

$factory->define(Promo::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['B1', 'B2', 'B3', 'M1', 'M2']),
        'specialty' => $faker->randomElement([
            'Informatique Ingésup',
            'Robotique Ingénierie Systèmes',
            'Marketing & Communication',
            'Audiovisuel',
            'Animation 3D Jeux Vidéo',
            'Création & Design',
        ]),
    ];
});
