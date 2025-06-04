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
        Schema::table('jogos', function (Blueprint $table) {
            $table->date('destacado_ate')->nullable();
        });

        Schema::table('consoles', function (Blueprint $table) {
            $table->date('destacado_ate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jogos', function (Blueprint $table) {
                $table->dropColumn('destacado_ate');
        });


        Schema::table('consoles', function (Blueprint $table) {
                $table->dropColumn('destacado_ate');
        });
    }
};
