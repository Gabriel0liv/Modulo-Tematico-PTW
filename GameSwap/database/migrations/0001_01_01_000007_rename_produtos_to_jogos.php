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
// Renomear a tabela
        Schema::rename('produtos', 'jogos');

        // Remover os campos desnecessários
        Schema::table('jogos', function (Blueprint $table) {
            $table->dropColumn(['publicador', 'ano_lancamento', 'desenvolvedor']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reverter o nome da tabela
        Schema::rename('jogos', 'produtos');

        // Recriar os campos removidos
        Schema::table('produtos', function (Blueprint $table) {
            $table->string('publicador')->nullable();
            $table->integer('ano_lancamento')->nullable();
            $table->string('desenvolvedor')->nullable();
        });
    }
};
