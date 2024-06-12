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
            $table->date('date')->nullable();
            $table->float('price_ticket', 8, 2)->required()->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hall_movie', function (Blueprint $table) {
            $table->dropColumn('date');
            $table->dropColumn('price_ticket');
        });
    }
};
