<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Clin\Models\HealthCare::class, function (Faker $faker) {
    return [
        'name' => $faker->domainName,
        'logo' => $faker->md5,
        'status' => $faker->boolean
    ];
});
