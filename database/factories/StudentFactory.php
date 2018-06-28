<?php

use Faker\Generator as Faker;

$factory->define(App\Student::class, function (Faker $faker) {

    $sexes = App\Sex::pluck('id')->all();

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'sex_id' => $faker->randomElement($sexes),
    ];
});
