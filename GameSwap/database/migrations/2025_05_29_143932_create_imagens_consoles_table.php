<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('imagens_consoles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('console_id');
            $table->string('path'); // Caminho da imagem
            $table->timestamps();

            // Chave estrangeira
            $table->foreign('console_id')->references('id')->on('consoles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('imagens_consoles');
    }
};
