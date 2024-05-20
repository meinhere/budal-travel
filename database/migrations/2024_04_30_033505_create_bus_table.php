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
        Schema::create('bus', function (Blueprint $table) {
            $table->char('kode_bus', 4)->primary();
            $table->char('kategori_kode', 4);
            $table->char('status_bus_kode', 1);
            $table->foreign('kategori_kode')->references('kode_kategori')->on('kategori_bus');
            $table->foreign('status_bus_kode')->references('kode_status')->on('status_bus');
            $table->string('nama_bus', 50);
            $table->float('kapasitas_solar');
            $table->char('kecepatan', 3);
            $table->integer('jumlah_kursi');
            $table->integer('harga_sewa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus');
    }
};
