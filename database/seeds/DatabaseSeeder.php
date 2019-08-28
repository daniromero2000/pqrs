<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
<<<<<<< HEAD
     * Run the database seeds.
=======
     * Seed the application's database.
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
     *
     * @return void
     */
    public function run()
    {
        $this->call(EmployeesTableSeeder::class);
        $this->call(MyCountryTableSeeder::class);
        $this->call(MyProvincesTableSeeder::class);
        $this->call(MyCitiesTableSeeder::class);
<<<<<<< HEAD
        $this->call(YearsTableSeeder::class);
        $this->call(SubsidiariesTableSeeder::class);
        $this->call(PqrStatusTableSeeder::class);
=======
        $this->call(SubsidiariesTableSeeder::class);
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
    }
}
