<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Clin\Models\HealthCare::class, function (Faker $faker) {
    return [
        'name' => $faker->domainName,
        'logo' => '1516935432.jpg',
        'status' => $faker->boolean
    ];
});
