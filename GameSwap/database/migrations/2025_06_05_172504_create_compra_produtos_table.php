<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompraProdutosTable extends Migration
{
    public function up()
    {
        Schema::create('compra_produtos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('compra_id')->constrained('compras')->onDelete('cascade');

            $table->unsignedBigInteger('produto_id');
            $table->string('tipo_produto'); // "jogo" ou "console"

            $table->foreignId('vendedor_id')->constrained('users');
            $table->integer('quantidade');
            $table->decimal('preco_unitario', 8, 2);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('compra_produtos');
    }
}
