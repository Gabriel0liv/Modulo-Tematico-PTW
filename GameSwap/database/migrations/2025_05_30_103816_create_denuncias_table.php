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
        Schema::create('denuncias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('id_denunciante');
            $table->unsignedBigInteger('id_denunciado');
            $table->string('tipo');
            $table->string('motivo');
            $table->boolean('status');

            $table->foreign('id_denunciante')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_denunciado')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('denuncias');
    }
};
