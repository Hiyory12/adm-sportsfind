<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $clientes = [
            [
                'nome' => "Hiury Gabriel Tressoldi",
                'email' => "hyu@gmail.com",
                'telefone' => "(49) 98883-0613",
            ],
            [
                'nome' => "Gabriel Augusto Weber",
                'email' => "weber@gmail.com",
                'telefone' => "(49) 96846-6848",
            ],
            [
                'nome' => "Gabriel Riboli",
                'email' => "neureoribolinho@gmail.com",
                'telefone' => "(49) 98465-8974",
            ],
            [
                'nome' => "Murilo Vizzotto",
                'email' => "muriloviz@gmail.com",
                'telefone' => "(49) 96485-3215",
            ],
        ];

        foreach($clientes as $cliente) {
            Cliente::create($cliente);
        }
    }
}
