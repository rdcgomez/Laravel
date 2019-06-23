<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'city' => $faker->city,
        'url_website' => $faker->url,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'contact' => $faker->numberBetween('00000000000', '99999999999'),
        'gender' => $faker->randomElement(['male', 'female']),
        // 'password' => bcrypt('password'), // password
        // 'remember_token' => Str::random(10),
    ];
});
