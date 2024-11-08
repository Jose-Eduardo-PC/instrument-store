<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instrument;

class InstrumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Instrument::factory(10)->create(); // Crear 10 registros de prueba
    }
}

