<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
<<<<<<< HEAD
use App\Socomir\Employees\Employee;
=======
use App\Model\Employees\Employee;
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4

$factory->define(Employee::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->firstName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'status' => 1, 
        'city' => 'Bogotá'

    ];
});
