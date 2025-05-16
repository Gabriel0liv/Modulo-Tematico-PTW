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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id(); // ID do produto
            $table->string('nome'); // Nome do produto
            $table->text('descricao')->nullable(); // Descrição do produto
            $table->decimal('preco', 10, 2); // Preço do produto
            $table->unsignedBigInteger('id_categoria'); // Categoria do produto
            $table->string('estado'); // Estado do produto (novo/usado)
            $table->boolean('moderado')->default(false); // Produto moderado
            $table->unsignedBigInteger('id_anunciante'); // ID do anunciante
            $table->unsignedBigInteger('id_comprador')->nullable(); // ID do comprador
            $table->string('desenvolvedor')->nullable(); // Desenvolvedor do produto
            $table->string('publicador')->nullable(); // Publicador do produto
            $table->year('ano_lancamento')->nullable(); // Ano de lançamento
            $table->string('idiomas')->nullable(); // Idiomas disponíveis
            $table->string('classificacao')->nullable(); // Classificação etária
            $table->string('regiao')->nullable(); // Região do produto
            $table->string('tipo_produto'); // Tipo do produto (jogo/console)
            $table->string('console')->nullable(); // Tipo de console (se aplicável)
            $table->string('morada')->nullable(); // Morada do produto
            $table->timestamps(); // Campos created_at e updated_at

            // Relacionamentos
            $table->foreign('id_categoria')->references('id')->on('categoria')->onDelete('cascade');
            $table->foreign('id_anunciante')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_comprador')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
