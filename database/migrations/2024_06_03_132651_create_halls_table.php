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
        Schema::create('halls', function (Blueprint $table) {
            $table->id();
            $table->string('name',255)->required();
            $table->string('color', 50)->nullable();
            $table->integer('seats_num')->required()->unsigned(); 
            $table->boolean('isense')->required()->default(false);
            $table->boolean('availability')->required()->default(true); 
            $table->decimal('base_price', 4,2)->required()->unsigned();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('halls');
    }
};
