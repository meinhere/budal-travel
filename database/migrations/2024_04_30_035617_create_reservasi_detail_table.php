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
            $table->char('kode_reservasi_detail', 8)->primary();
            $table->char('wisata_kode', 8);
            $table->char('reservasi_kode', 8);
            $table->foreign('wisata_kode')->references('kode_wisata')->on('wisata');
            $table->foreign('reservasi_kode')->references('kode_reservasi')->on('reservasi');
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
