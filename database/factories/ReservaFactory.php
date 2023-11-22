<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Cliente;
use App\Models\Espaco;
use App\Models\reserva;

class ReservaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reserva::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'inicio' => $this->faker->dateTime(),
            'fim' => $this->faker->dateTime(),
            'valor' => $this->faker->randomFloat(0, 0, 9999999999.),
            'cliente_id' => Cliente::factory(),
            'espaco_id' => Espaco::factory(),
        ];
    }
}
