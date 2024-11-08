<?php

namespace Database\Factories;

use App\Models\Instrument;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstrumentFactory extends Factory
{
    protected $model = Instrument::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'category_id' => Category::inRandomOrder()->first()->id, // Selecciona una categoría aleatoria existente
        ];
    }
}


