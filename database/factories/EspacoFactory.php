<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Categorium;
use App\Models\espaco;

class EspacoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Espaco::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->randomLetter,
            'endereco' => $this->faker->randomLetter,
            'descricao' => $this->faker->randomLetter,
            'fotos' => $this->faker->randomLetter,
            'valorHora' => $this->faker->randomFloat(0, 0, 9999999999.),
            'categoria_id' => Categorium::factory(),
        ];
    }
}
