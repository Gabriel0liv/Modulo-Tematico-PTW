<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('favoritos')) {
            Schema::create('favoritos', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->unsignedBigInteger('id_utilizador');
                $table->unsignedBigInteger('id_produto');

                // Relacionamentos
                $table->foreign('id_utilizador')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('id_produto')->references('id')->on('produtos')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favoritos');
    }
};
