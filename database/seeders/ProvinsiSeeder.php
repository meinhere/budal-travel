<?php

namespace Database\Seeders;

use App\Models\Provinsi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Provinsi::create([
            'kode_provinsi' => '33',
            'nama_provinsi' => 'Jawa Tengah',
        ]);

        Provinsi::create([
            'kode_provinsi' => '35',
            'nama_provinsi' => 'Jawa Timur',
        ]);
    }
}
