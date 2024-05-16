<?php

namespace Database\Seeders;

use App\Models\KategoriBus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriBusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriBus::create([
            'nama_kategori' => 'Jetbus 3+',
        ]);

        KategoriBus::create([
            'nama_kategori' => 'Jetbus 5',
        ]);
    }
}
