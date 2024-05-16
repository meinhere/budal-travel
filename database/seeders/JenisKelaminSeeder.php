<?php

namespace Database\Seeders;

use App\Models\JenisKelamin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisKelaminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisKelamin::create([
            'keterangan' => "Laki-Laki",
        ]);

        JenisKelamin::create([
            'keterangan' => "Perempuan",
        ]);
    }
}
