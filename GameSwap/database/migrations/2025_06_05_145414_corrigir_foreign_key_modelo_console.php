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
        Schema::table('consoles', function (Blueprint $table) {
            // Remove a foreign key antiga
            $table->dropForeign(['modelo_console_id']);
        });

        Schema::table('consoles', function (Blueprint $table) {
            // Altera o tipo da coluna (se necessário)
            $table->unsignedBigInteger('modelo_console_id')->change();

            // Adiciona a foreign key correta
            $table->foreign('modelo_console_id')
                ->references('id')
                ->on('modelo_consoles')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('consoles', function (Blueprint $table) {
            $table->dropForeign(['modelo_console_id']);
        });

        Schema::table('consoles', function (Blueprint $table) {
            // Voltar a tipo antigo, se era string
            $table->string('modelo_console_id')->change();

            // Restaurar a foreign key antiga (para 'nome')
            $table->foreign('modelo_console_id')
                ->references('nome')
                ->on('modelo_consoles')
                ->onDelete('cascade');
        });
    }
};
