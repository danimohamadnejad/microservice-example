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
        Schema::connection('soa-user')->table('users', function (Blueprint $table) {
            $table->string('mobile')->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('soa-user')->table('users', function (Blueprint $table) {
            $table->dropColumn('mobile');
        });
    }
};
