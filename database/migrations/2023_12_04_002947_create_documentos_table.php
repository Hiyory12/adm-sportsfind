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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
<<<<<<<< HEAD:database/migrations/2023_12_04_002947_create_documentos_table.php
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->char('titular', 255);
========
            $table->foreignId('cliente_id')->constrained();
            $table->foreignId('categoria_id')->constrained();
>>>>>>>> 173d9a457c8d8efb67b5573996a4a010fdfd87d9:database/migrations/2023_11_22_175121_create_documentos_table.php
            $table->string('numero');
            $table->string('foto', 255);
            $table->string('plano', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
