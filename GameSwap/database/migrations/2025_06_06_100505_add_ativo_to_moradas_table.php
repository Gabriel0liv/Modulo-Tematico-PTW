<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('moradas', function (Blueprint $table) {
            $table->boolean('ativo')->default(true)->after('user_id');
        });
    }

    public function down(): void
    {
        Schema::table('moradas', function (Blueprint $table) {
            $table->dropColumn('ativo');
        });
    }
};
