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
        Schema::create('showtimes', function (Blueprint $table) {
            $table->id();  // généralement int unsigned, à vérifier !
            $table->integer('cinema_id'); // même type que cinemas.id (int sans unsigned)
            $table->foreign('cinema_id')->references('id')->on('cinemas')->onDelete('cascade');
            $table->time('start_time');
            $table->time('end_time')->nullable();
            $table->date('date');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('showtimes');
    }
};
