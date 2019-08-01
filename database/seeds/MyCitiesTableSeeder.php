<?php

use Illuminate\Database\Seeder;

class MyCitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('cities')->insert(array (
            0 =>
                array (
                    'name' => 'Pereira',
                    'province_id' => '1',
                ),
            1 =>
                array (
                    'name' => 'Dosquebradas',
                    'province_id' => '1',
                ),
            2 =>
                array (
                    'name' => 'Tuluá',
                    'province_id' => '2',
                ),
            3 =>
                array (
                    'name' => 'Cartago',
                    'province_id' => '2',
                ),
        ));
    }
}