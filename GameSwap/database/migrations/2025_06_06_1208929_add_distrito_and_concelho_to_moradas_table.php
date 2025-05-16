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
        Schema::table('moradas', function (Blueprint $table) {
            $table->foreign('distrito_id')->references('id')->on('distritos');
            $table->foreign('concelho_id')->references('id')->on('concelhos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('moradas', function (Blueprint $table) {
            Schema::table('moradas', function (Blueprint $table) {
                $table->dropColumn('distrito_id');
                $table->dropColumn('concelho_id');
            });
        });
    }
};
