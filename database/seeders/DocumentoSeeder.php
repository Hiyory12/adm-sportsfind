<?php

namespace Database\Seeders;

use App\Models\Documento;
use Illuminate\Database\Seeder;

class DocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $documentos = [
            [
                'cliente_id' => 1,
                'titular' => "Cristiano Ronaldo",
                'numero' => "7",
                'foto' => "cris.jpg",
                'plano' => "Plano Lenda",
            ],
            [
                'cliente_id' => 2,
                'titular' => "Messi",
                'numero' => "30",
                'foto' => "messi.jpg",
                'plano' => "Plano Lenda",
            ],
            [
                'cliente_id' => 3,
                'titular' => "Neymar",
                'numero' => "11",
                'foto' => "ney.jpg",
                'plano' => "Plano Starter",
            ],
            [
                'cliente_id' => 4,
                'titular' => "Paolo Maldini",
                'numero' => "3",
                'foto' => "maldini.jpg",
                'plano' => "Plano Pro",
            ],
        ];

        foreach($documentos as $documento) {
            Documento::create($documento);
        }
    }
}
