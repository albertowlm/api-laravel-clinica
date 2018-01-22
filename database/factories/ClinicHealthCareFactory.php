<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Clin\Models\ClinicHealthCare::class, function (Faker $faker) {
    return [
        'clinic_id' =>  $faker->randomElement(Clin\Models\Clinic::pluck('id')->toArray()),
        'health_care_id' =>  $faker->randomElement(Clin\Models\HealthCare::pluck('id')->toArray()),
        'user_id' =>  $faker->randomElement(Clin\Models\User::pluck('id')->toArray())

    ];
});
