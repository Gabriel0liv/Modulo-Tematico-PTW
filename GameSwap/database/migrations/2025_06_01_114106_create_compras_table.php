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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comprador_id')->constrained('users');
            $table->foreignId('morada_id')->constrained('moradas');
            $table->foreignId('cartao_id')->constrained('payment_methods'); // ou null se for pagar em dinheiro, etc
            $table->decimal('total', 8, 2);
            $table->string('status')->default('pendente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
