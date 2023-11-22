<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\documento;

class DocumentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Documento::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'titular' => $this->faker->randomLetter,
            'numero' => $this->faker->word,
        ];
    }
}
