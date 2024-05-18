<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Karyawan::create([
            'role_id' => '1',
            'login_id' => '3',
            'jenis_kelamin_kode' => '1',
            'nama_karyawan' => 'Saiful Huda',
            'no_telepon' => '082146153816'
        ]);

        Karyawan::create([
            'role_id' => '2',
            'login_id' => '2',
            'jenis_kelamin_kode' => '1',
            'nama_karyawan' => 'Habibul Akhyar',
            'no_telepon' => '087865306707'
        ]);

    }
}
