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

use App\Socomir\Years\Year;
use Illuminate\Http\UploadedFile;

$factory->define(Year::class, function (Faker\Generator $faker) {
    $year = $faker->unique()->randomElement([
        'Años',
    ]);

    return [
        'year' => $year,
        'slug' => str_slug($year),
        'status' => 1
    ];
});
