<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('imagens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jogo_id');
            $table->string('caminho');
            $table->timestamps();

            $table->foreign('jogo_id')->references('id')->on('jogos')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('imagens');
    }
};
