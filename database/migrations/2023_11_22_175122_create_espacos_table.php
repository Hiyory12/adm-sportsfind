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
<<<<<<< HEAD
            $table->char('nome', 50);
            $table->char('esporte', 50);
            $table->char('endereco', 255);
            $table->char('descricao', 255);
=======
            $table->char('nome', 255);
            $table->char('endereco', 100);
            $table->char('descricao', 100);
>>>>>>> 173d9a457c8d8efb67b5573996a4a010fdfd87d9
            $table->char('foto');
            $table->float('valorHora');
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
