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
            $table->char('kode_reservasi', 8)->primary();
            $table->char('login_id',4);
            $table->char('bus_kode', 4);
            $table->char('status_reservasi_kode', 1);
            $table->char('kota_kode', 4);
            $table->foreign('login_id')->references('id_login')->on('login');
            $table->foreign('bus_kode')->references('kode_bus')->on('bus');
            $table->foreign('status_reservasi_kode')->references('kode_status')->on('status_reservasi');
            $table->foreign('kota_kode')->references('kode_kota')->on('kota');
            $table->string('snap_token', 100)->nullable();
            $table->timestamp('waktu_reservasi')->useCurrent();
            $table->timestamp('waktu_bayar')->nullable()->default(null);
            $table->string('metode_bayar', 20)->nullable()->default(null);
            $table->integer('jumlah_penumpang')->default(1);
            $table->integer('jumlah_makan')->default(0);
            $table->integer('harga_makan')->default(0);
            $table->enum('tarif_masuk', ['ya', 'tidak'])->default('tidak');
            $table->string('titik_awal', 100);
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
