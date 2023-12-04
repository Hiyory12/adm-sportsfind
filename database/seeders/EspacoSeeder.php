<?php

namespace Database\Seeders;

use App\Models\Espaco;
use Illuminate\Database\Seeder;

class EspacoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $espacos = [
            [
                'nome' => "F7 Campo e Sede Esportiva",
                'esporte' => "Futebol",
                'endereco' => "Rua das Bromélias, 76-D. Bairro Passo dos Fortes. Chapecó - SC",
                'descricao' => "Campo de futebol 7, conta com espaço para vestiário, salão de festas e bar",
                'valorHora' => 59.99,
                'foto' => 'foto1.jpg',
            ],
            [
                'nome' => "Tennynson",
                'esporte' => "Tênis | Tênis de Mesa",
                'endereco' => "Rua das Cerejeiras, 42-E. Bairro Presidente Médici. Chapecó - SC",
                'descricao' => "Espaço amplo com quadra para tênis e mesas para a prática de tênis de mesa/ping-pong. Contamos com todos os equipamentos já inclusos e ambiente diferenciado",
                'valorHora' => 29.99,
                'foto' => 'foto2.jpg',
            ],
            [
                'nome' => "Aqua Kingdom",
                'esporte' => "Natação",
                'endereco' => "Rua das Mangueiras, 526-D. Bairro Centro. Xaxim - SC",
                'descricao' => "Espaço completo com piscina olímpica disponível para aluguel de equipes e delegações. Lanchonete próxima e academia.",
                'valorHora' => 159.99,
                'foto' => 'foto3.jpg',
            ],
            [
                'nome' => "Campo HS",
                'esporte' => "Paintball",
                'endereco' => "Rua das Araucárias, 76-D. Bairro Líder. Xanxerê - SC",
                'descricao' => "Campo de paintball localizado na saída da cidade, com 2000 m² completamente ambientados para você se divertir com os amigos",
                'valorHora' => 149.99,
                'foto' => 'foto4.jpg',
            ],
            [
                'nome' => "Next Step Quadra",
                'esporte' => "Futsal",
                'endereco' => "Rua das Barões da Pisadinha, 776-E. Bairro Efapi. Chapecó - SC",
                'descricao' => "Quadra coberta de futsal, conta com arquibancada, vestiários, bar, além de equipamentos e uniformes",
                'valorHora' => 49.99,
                'foto' => 'foto5.jpg',
            ],
        ];

        foreach($espacos as $espaco) {
            Espaco::create($espaco);
        }
    }
}
