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
        Schema::create('consoles', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('tipo_produto');
            $table->string('tipo_console');
            $table->unsignedBigInteger('id_anunciante');
            $table->unsignedBigInteger('id_comprador')->nullable();
            $table->boolean('moderado')->default(false);
            $table->boolean('destaque')->default(false);
            $table->text('descricao');
            $table->decimal('preco', 10, 2);
            $table->timestamps();

            // Relacionamentos
            $table->foreign('id_anunciante')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_comprador')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consoles');
    }
};
