<?php

<<<<<<< HEAD
use App\Socomir\Countries\Country;
=======
use App\Model\Countries\Country;
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
use Illuminate\Database\Seeder;

class MyCountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('countries')->insert(array (
            
           1 =>
                array (
                    'id' => '1',
                    'iso' => 'CO',
                    'name' => 'Colombia',
                    'iso3' => 'COL',
                    'numcode' => '170',
                    'phonecode' => '57',
                    'status' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ),
        ));
    }
}