<?php

namespace Database\Seeders;

use App\Models\Reserva;
use Illuminate\Database\Seeder;

class ReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reservas = [
            [
                'cliente_id' => 1,
                'espaco_id' => 1,
                'valor' => 289.99,
                'inicio' => '2023-12-05 00:00:00',
                'fim' => '2023-12-05 23:59:59',
            ],
            [
                'cliente_id' => 1,
                'espaco_id' => 3,
                'valor' => 119.99,
                'inicio' => '2023-12-06 12:00:00',
                'fim' => '2023-12-06 16:59:59',
            ],
            [
                'cliente_id' => 2,
                'espaco_id' => 2,
                'valor' => 49.99,
                'inicio' => '2023-12-05 11:00:00',
                'fim' => '2023-12-05 11:59:59',
            ],
            [
                'cliente_id' => 3,
                'espaco_id' => 4,
                'valor' => 429.99,
                'inicio' => '2023-12-05 12:00:00',
                'fim' => '2023-12-05 16:59:59',
            ],
            [
                'cliente_id' => 4,
                'espaco_id' => 4,
                'valor' => 49.99,
                'inicio' => '2023-12-05 10:00:00',
                'fim' => '2023-12-05 10:59:59',
            ],
            [
                'cliente_id' => 5,
                'espaco_id' => 3,
                'valor' => 1169.99,
                'inicio' => '2023-12-07 12:00:00',
                'fim' => '2023-12-08 11:59:59',
            ],
            [
                'cliente_id' => 6,
                'espaco_id' => 2,
                'valor' => 29.99,
                'inicio' => '2023-12-06 12:00:00',
                'fim' => '2023-12-06 12:30:00',
            ],
            [
                'cliente_id' => 7,
                'espaco_id' => 1,
                'valor' => 279.99,
                'inicio' => '2024-01-06 12:00:00',
                'fim' => '2024-01-06 16:59:59',
            ],
            [
                'cliente_id' => 8,
                'espaco_id' => 5,
                'valor' => 379.99,
                'inicio' => '2023-12-06 12:00:00',
                'fim' => '2023-12-06 12:30:00',
            ],
        ];

        foreach($reservas as $reserva) {
            Reserva::create($reserva);
        }
    }
}
