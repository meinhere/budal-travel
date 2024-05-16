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
        Schema::create('kategori_feedback', function (Blueprint $table) {
            $table->char('kode_kategori', 1)->primary();
            $table->enum('tanggapan', ['Senang', 'Biasa', 'Tidak Senang']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_feedback');
    }
};
