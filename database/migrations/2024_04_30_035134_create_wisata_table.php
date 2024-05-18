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
        Schema::create('wisata', function (Blueprint $table) {
            $table->char('kode_wisata', 8)->primary();
            $table->char('kota_kode', 4);
            $table->foreign('kota_kode')->references('kode_kota')->on('kota');
            $table->string('nama_wisata', 50);
            $table->text('alamat_wisata');
            $table->time('jam_buka');
            $table->time('jam_tutup');
            $table->integer('tarif_masuk_wisata');
            $table->integer('tarif_parkir');
            $table->string('titik_lokasi', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wisata');
    }
};