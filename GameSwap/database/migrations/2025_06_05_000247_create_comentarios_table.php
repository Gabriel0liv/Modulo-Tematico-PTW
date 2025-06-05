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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('conteudo');
            $table->unsignedBigInteger('id_destinatario');
            $table->unsignedBigInteger('id_remetente');

            // Relacionamentos
            $table->foreign('id_destinatario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_remetente')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
