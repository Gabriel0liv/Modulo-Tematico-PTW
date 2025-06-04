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
            $table->unsignedBigInteger('id_anunciante');
            $table->unsignedBigInteger('id_comprador')->nullable();
            $table->boolean('moderado')->default(false);
            $table->boolean('destaque')->default(false);
            $table->string('modelo_console_id')->nullable();
            $table->text('descricao');
            $table->decimal('preco', 10, 2);
            $table->timestamps();

            // Relacionamentos
            $table->foreign('id_anunciante')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_comprador')->references('id')->on('users')->onDelete('set null');
            $table->foreign('modelo_console_id')->references('nome')->on('modelo_consoles')->ondelete('set null')->nullable(); // Tipo de console (se aplicável)
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
