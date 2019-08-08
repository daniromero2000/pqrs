<?php

use App\Socomir\Years\Year;
use Illuminate\Database\Seeder;

class YearsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Year::class)->create();
    }
}