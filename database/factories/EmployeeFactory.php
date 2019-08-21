<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    static $password;

    return [
        'employeeName' => $faker->firstName,
        'employeeEmail' => $faker->unique()->safeEmail,
        'employeePassword' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'employeeStatus' => 1, 
        'employeeCity' => 'Bogotá'
    ];
});
