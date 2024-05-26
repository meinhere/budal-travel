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
        Schema::create('feedback', function (Blueprint $table) {
            $table->char('kode_feedback', 8)->primary();
            $table->char('reservasi_kode', 8);
            $table->char('kategori_kode', 1);
            $table->foreign('reservasi_kode')->references('kode_reservasi')->on('reservasi');
            $table->foreign('kategori_kode')->references('kode_kategori')->on('kategori_feedback');
            $table->text('ulasan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
