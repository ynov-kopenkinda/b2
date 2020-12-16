<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Restaurant;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {
    $randomState = [
        'OPEN',
        'CLOSED',
        'WORKING',
    ][rand(0, 2)];
    $randomFoodType = [
        $faker->emoji,
        $faker->emoji,
        $faker->emoji,
        $faker->emoji,
        $faker->emoji,
    ];
    $randomFoodType = join(',', array_slice($randomFoodType, rand(0, 3)));
    return [
        'name' => $faker->company,
        'address' => $faker->address,
        'city' => $faker->city,
        'postal_code' => substr($faker->postcode, 0, 5),
        'website' => $faker->domainName,
        'description' => $faker->paragraph,
        'food_type' => $randomFoodType,
        'state' => $randomState,
    ];
});
