<?php

namespace Database\Seeders;

use App\Models\StatusBus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusBusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatusBus::create([
            'deskripsi' => 'Tersedia',
        ]);

        StatusBus::create([
            'deskripsi' => 'Habis',
        ]);
    }
}
