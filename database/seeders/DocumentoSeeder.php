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
                'foto' => "doc1.jpg",
                'plano' => "Plano Lenda",
            ],
            [
                'cliente_id' => 2,
                'titular' => "Neymar",
                'numero' => "11",
                'foto' => "doc2.jpg",
                'plano' => "Plano Pro",
            ],
        ];

        foreach($documentos as $documento) {
            Documento::create($documento);
        }
    }
}
