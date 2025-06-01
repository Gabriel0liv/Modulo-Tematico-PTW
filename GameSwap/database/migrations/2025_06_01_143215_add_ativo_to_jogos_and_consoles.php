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
        Schema::table('jogos', function (Blueprint $table) {
            $table->boolean('ativo')->default(true)->after('descricao'); // ajuste a posição se necessário
        });

        Schema::table('consoles', function (Blueprint $table) {
            $table->boolean('ativo')->default(true)->after('descricao'); // ou outra coluna de referência
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jogos', function (Blueprint $table) {
            $table->dropColumn('ativo');
        });

        Schema::table('consoles', function (Blueprint $table) {
            $table->dropColumn('ativo');
        });
    }
};
