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
        Schema::create('kota', function (Blueprint $table) {
            $table->char('kode_kota', 4)->primary();
            $table->char('provinsi_kode', 2);
            $table->foreign('provinsi_kode')->references('kode_provinsi')->on('provinsi');
            $table->string('nama_kota', length: 40);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kota');
    }
};
