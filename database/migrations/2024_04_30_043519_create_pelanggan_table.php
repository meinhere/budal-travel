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
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->char('id_pelanggan', 4)->primary();
            $table->char('jenis_kelamin_kode', 1);
            $table->char('login_id', 4);
            $table->foreign('jenis_kelamin_kode')->references('kode_jenis_kelamin')->on('jenis_kelamin');
            $table->foreign('login_id')->references('id_login')->on('login');
            $table->string('nama_pelanggan', 50);
            $table->text('alamat');
            $table->string('no_telepon', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan');
    }
};
