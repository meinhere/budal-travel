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
            $table->id()->length(4);
            $table->foreignId('kota_id');
            $table->string('nama_wisata', length: 50);
            $table->text('alamat_wisata');
            $table->time('jam_buka');
            $table->time('jam_tutup');
            $table->integer('tarif_masuk_wisata');
            $table->integer('tarif_parkir');
            $table->char('longitude', length: 15);
            $table->char('latitude', length: 15);
            $table->timestamps();
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
