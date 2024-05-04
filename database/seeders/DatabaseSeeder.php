<?php

namespace Database\Seeders;

use App\Models\JenisKelamin;
use App\Models\Pelanggan;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        JenisKelamin::create([
            'keterangan' => "Laki-Laki",
        ]);

        JenisKelamin::create([
            'keterangan' => "Perempuan",
        ]);

        Pelanggan::create([
            'jenis_kelamin_id' => 1,
            'nama_pelanggan' => 'Ronggo Widjoyo',
            'username' => 'ronggo',
            'password' => bcrypt('12345'),
            'alamat' => 'Brondong, Lamongan'
        ]);
    }
}
