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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->char('id_karyawan', 4)->primary();
            $table->char('role_id', 1);
            $table->char('login_id', 4);
            $table->char('jenis_kelamin_kode', 1);
            $table->foreign('role_id')->references('id_role')->on('role');
            $table->foreign('login_id')->references('id_login')->on('login');
            $table->foreign('jenis_kelamin_kode')->references('kode_jenis_kelamin')->on('jenis_kelamin');
            $table->string('nama_karyawan', 50);
            $table->string('no_telepon', 15);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
