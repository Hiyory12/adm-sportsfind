<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\EspacoSeeder;
use Database\Seeders\ClienteSeeder;
use Database\Seeders\DocumentoSeeder;
use Database\Seeders\ReservaSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            EspacoSeeder::class,
            ClienteSeeder::class,
            DocumentoSeeder::class,
            ReservaSeeder::class,
        ]);
    }
}
