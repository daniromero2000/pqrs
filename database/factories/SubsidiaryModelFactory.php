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
use App\Socomir\Subsidiaries\Subsidiary;
use App\Socomir\Cities\City;
=======
use App\Model\Subsidiaries\Subsidiary;
use App\Model\Cities\City;
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
use Illuminate\Http\UploadedFile;

$factory->define(Subsidiary::class, function (Faker\Generator $faker) {
    $name = $faker->unique()->randomElement([
        'La 19',
    ]);

    $city= factory(City::class)->create();

    return [
        'name' => $name,
        'address' => str_slug($name),
        'phone' => 3183643,
        'city_id' => $city->id
    ];
});
