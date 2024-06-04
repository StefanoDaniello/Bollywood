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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->required();
            $table->string('original_title', 255)->nullable();
            $table->text('overview')->nullable();
            $table->string('cover_image', 255)->nullable();
            $table->date('release_date')->required();
            $table->string('trailer', 255)->nullable();
            $table->string('language', 100)->required();
            $table->time('duration')->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
