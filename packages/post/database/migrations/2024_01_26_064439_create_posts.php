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
        Schema::connection('soa-post')->create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('user_id')->references('id')->on('user_reflections')
             ->onDelete('cascade')->onUpdate('cascade');
            $table->string('title');
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('soa-post')->dropIfExists('posts');
    }
};
