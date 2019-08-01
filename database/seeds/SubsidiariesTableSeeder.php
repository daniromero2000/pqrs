<?php

use App\Socomir\Subsidiaries\Subsidiary;
use Illuminate\Database\Seeder;

class SubsidiariesTableSeeder extends Seeder
{
    public function run()
    {
        factory(Subsidiary::class)->create();
    }
}