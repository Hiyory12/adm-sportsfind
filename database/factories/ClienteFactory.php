<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Documento;
use App\Models\cliente;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->randomLetter,
            'email' => $this->faker->safeEmail,
            'telefone' => $this->faker->word,
            'documento_id' => Documento::factory(),
        ];
    }
}
