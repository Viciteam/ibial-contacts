<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contacts;
use Faker\Generator as Faker;

$factory->define(Contacts::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomNumber,
        'contact_name' => $faker->name,
        'contact_email' => $faker->unique()->safeEmail,
        'contact_address' => $faker->address,
        'mobile_phone' => $faker->phoneNumber,
        'job_title' => $faker->jobTitle
    ];
});
