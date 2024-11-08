<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insertar datos en la tabla categories
        DB::table('categories')->insert([
            ['name' => 'Instrumentos de Percusión'],
            ['name' => 'Instrumentos de Cuerda'],
            ['name' => 'Instrumentos de Viento'],
            ['name' => 'Instrumentos Electrónicos'],
            ['name' => 'Accesorios']
        ]);
    }
}
