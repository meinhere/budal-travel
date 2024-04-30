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
            $table->id()->length(4);
            $table->foreignId('kategori_id');
            $table->foreignId('status_bus_id');
            $table->string('nama_bus', length: 50);
            $table->float('kapasitas_solar');
            $table->integer('jumlah_kursi');
            $table->integer('harga_sewa');
            $table->timestamps();
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
