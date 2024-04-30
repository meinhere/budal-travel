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
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id');
            $table->foreignId('bus_id');
            $table->foreignId('pelanggan_id');
            $table->foreignId('status_reservasi_id');
            $table->timestamp('waktu_reservasi')->useCurrent();
            $table->timestamp('waktu_bayar')->useCurrent();
            $table->string('metode_bayar', length: 20);
            $table->integer('jumlah_penumpang');
            $table->integer('jumlah_makan');
            $table->integer('harga_makan');
            $table->boolean('tarif_masuk');
            $table->string('titik_awal', length: 50);
            $table->time('jam_berangkat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasi');
    }
};
