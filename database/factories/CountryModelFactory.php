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
use App\Socomir\Countries\Country;
=======
use App\Model\Countries\Country;
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4

$factory->define(Country::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->unique()->country,
        'iso' => $faker->unique()->countryISOAlpha3,
        'iso3' => $faker->unique()->countryISOAlpha3,
        'numcode' => $faker->randomDigit,
        'phonecode' => $faker->randomDigit,
        'status' => 1
    ];
});
