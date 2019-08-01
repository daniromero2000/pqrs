<?php

use App\Socomir\PqrStatuses\PqrStatus;
use Illuminate\Database\Seeder;

class PqrStatusTableSeeder extends Seeder
{
    public function run()
    {
        factory(PqrStatus::class)->create([
            'name' => 'Contactado',
            'color' => 'green'
        ]);

        factory(PqrStatus::class)->create([
            'name' => 'Sin Decidir',
            'color' => 'yellow'
        ]);

        factory(PqrStatus::class)->create([
            'name' => 'Sin Contactar',
            'color' => 'red'
        ]);

        factory(PqrStatus::class)->create([
            'name' => 'Sin enviar Información',
            'color' => 'blue'
        ]);

        factory(PqrStatus::class)->create([
            'name' => 'Comprometido',
            'color' => 'grey'
        ]);

        factory(PqrStatus::class)->create([
            'name' => 'Re Contactar',
            'color' => 'orange'
        ]);
    }
}