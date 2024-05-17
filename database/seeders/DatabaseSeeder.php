<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            KaryawanSeeder::class,
            KategoriBusSeeder::class,
            StatusBusSeeder::class,
            BusSeeder::class,
            KategoriFeedbackSeeder::class,
            KotaSeeder::class,
            WisataSeeder::class,

        ]);
    }
}
