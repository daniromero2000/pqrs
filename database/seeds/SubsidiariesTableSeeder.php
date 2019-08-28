<?php

<<<<<<< HEAD
use App\Socomir\Subsidiaries\Subsidiary;
=======
use App\Model\Subsidiaries\Subsidiary;
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
use Illuminate\Database\Seeder;

class SubsidiariesTableSeeder extends Seeder
{
    public function run()
    {
        factory(Subsidiary::class)->create();
    }
}