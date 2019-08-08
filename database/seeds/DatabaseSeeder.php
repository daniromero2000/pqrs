<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EmployeesTableSeeder::class);
        $this->call(MyCountryTableSeeder::class);
        $this->call(MyProvincesTableSeeder::class);
        $this->call(MyCitiesTableSeeder::class);
        $this->call(YearsTableSeeder::class);
        $this->call(SubsidiariesTableSeeder::class);
        $this->call(PqrStatusTableSeeder::class);
    }
}
