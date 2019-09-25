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
        \DB::table('cities')->insert(array(
            0 =>
            array(
                'name' => 'Pereira',
                'dane' => '1',
                'province_id' => '1',
            ),
            1 =>
            array(
                'name' => 'Dosquebradas',
                'dane' => '2',
                'province_id' => '1',
            ),
            2 =>
            array(
                'name' => 'Tuluá',
                'dane' => '3',
                'province_id' => '2',
            ),
            3 =>
            array(
                'name' => 'Cartago',
                'dane' => '4',
                'province_id' => '2',
            ),
        ));
    }
}
