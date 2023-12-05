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
                'nome' => "Cristiano Ronaldo",
                'email' => "cr7@gmail.com",
                'telefone' => "(49) 98883-6841",
            ],
            [
                'nome' => "Lionel Messi",
                'email' => "messi@gmail.com",
                'telefone' => "(49) 96846-6848",
            ],
            [
                'nome' => "Neymar Jr.",
                'email' => "neymarjr@gmail.com",
                'telefone' => "(49) 98465-8974",
            ],
            [
                'nome' => "Paolo Maldini",
                'email' => "maldini@gmail.com",
                'telefone' => "(49) 96485-3215",
            ],[
                'nome' => "Hiury",
                'email' => "hyu@gmail.com",
                'telefone' => "(49) 98883-0613",
            ],
            [
                'nome' => "Weber",
                'email' => "weber@gmail.com",
                'telefone' => "(49) 96516-7524",
            ],
            [
                'nome' => "Murilo",
                'email' => "muriloviz@gmail.com",
                'telefone' => "(49) 98487-3265",
            ],
            [
                'nome' => "Riboli",
                'email' => "ribolinho@gmail.com",
                'telefone' => "(49) 98521-6478",
            ],
        ];

        foreach($clientes as $cliente) {
            Cliente::create($cliente);
        }
    }
}
