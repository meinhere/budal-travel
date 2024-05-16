<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bus;
use App\Models\Kota;
use App\Models\Wisata;
use App\Models\Karyawan;
use App\Models\StatusBus;
use Illuminate\Database\Seeder;
use App\Models\KategoriFeedback;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            JenisKelaminSeeder::class,
            LoginSeeder::class,
            PelangganSeeder::class,
            ProvinsiSeeder::class,
            RoleSeeder::class,
            Karyawan::class,
            KategoriBusSeeder::class,
            StatusBus::class,
            Bus::class,
            KategoriFeedback::class,
            Kota::class,
            Wisata::class,
        ]);
    }
}
