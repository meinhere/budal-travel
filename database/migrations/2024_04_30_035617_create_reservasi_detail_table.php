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
        Schema::create('reservasi_detail', function (Blueprint $table) {
            $table->id()->length(4);
            $table->foreignId('wisata_id');
            $table->foreignId('reservasi_id');
            $table->time('waktu_wisata');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasi_detail');
    }
};
