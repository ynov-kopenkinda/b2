<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use App\Restaurant;
use Faker\Generator as Faker;

function getRandomId() {
    $restaurants = Restaurant::all();
    $l = sizeof($restaurants);
    $i = random_int(0, $l - 1 );
    $ret = $restaurants[$i]->id;
    return $ret;
}

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'restaurant_id' => getRandomId(),
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
    ];
});
