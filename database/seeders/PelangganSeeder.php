<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelanggan::create([
            'login_id' => '1',
            'jenis_kelamin_kode' => '1',
            'nama_pelanggan' => 'Ronggo Widjoyo',
            'alamat' => 'Brondong, Lamongan',
            'no_telepon' => '081234567890',
        ]);
    }
}
