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
        Schema::table('hall_movie', function (Blueprint $table) {
            $table->unsignedBigInteger('time_slot_id')->nullable()->after('id');
            $table->foreign('time_slot_id')->references('id')->on('time_slots')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hall_movie', function (Blueprint $table) {
            $table->dropForeign('hall_movie_time_slot_id_foreign');
            $table->dropColumn('time_slot_id');
        });
    }
};
