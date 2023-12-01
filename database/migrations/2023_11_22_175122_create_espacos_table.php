<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('espacos', function (Blueprint $table) {
            $table->id();
            $table->char('nome', 255);
            $table->char('endereco', 100);
            $table->char('descricao', 100);
            $table->char('foto');
            $table->float('valorHora');
            $table->foreignId('categoria_id')->constrained();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('espacos');
    }
};
