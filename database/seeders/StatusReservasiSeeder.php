<?php

namespace Database\Seeders;

use App\Models\StatusReservasi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusReservasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatusReservasi::create([
            'deskripsi' => 'Berhasil'
        ]);

        StatusReservasi::create([
            'deskripsi' => 'Gagal'
        ]);

        StatusReservasi::create([
            'deskripsi' => 'Pending'
        ]);
    }
}
