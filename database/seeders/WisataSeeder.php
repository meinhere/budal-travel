<?php

namespace Database\Seeders;

use App\Models\Wisata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // wisata di jawa timur
        Wisata::create([
            'kota_kode' => '3578',
            'nama_wisata' => 'Kenjeran Park Surabaya',
            'alamat_wisata' => 'Sukolilo Baru, Bulak, Surabaya, East Java 60122',
            'jam_buka' => '08:00',
            'jam_tutup' => '18:00',
            'tarif_masuk_wisata' => 5000,
            'tarif_parkir' => 10000,
            'titik_lokasi' => '-7.2522639,112.7939782'
        ]);

        Wisata::create([
            'kode_kota' => '3578',
            'nama_wisata' => 'Masjid Nasional Al Akbar Surabaya',
            'alamat_wisata' => 'Jl. Masjid Al-AkbarTimur No.1, Pagesangan, Kec. Jambangan, Surabaya, Jawa Timur 60274',
            'jam_buka' => '00:00',
            'jam_tutup' => '23:59',
            'tarif_masuk_wisata' => 0,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-7.3366617,112.711438'

        ]);


        // wisata di jawa tengah
        Wisata::create([
            'kota_kode' => '3374',
            'nama_wisata' => 'Taman Bunga Celosia Semarang',
            'alamat_wisata' => 'Banyukuning, Bandungan, Semarang Regency, Central Java 50614',
            'jam_buka' => '08:00',
            'jam_tutup' => '16:00',
            'tarif_masuk_wisata' => 20000,
            'tarif_parkir' => 15000,
            'titik_lokasi' => '-7.225358,110.3417579'
        ]);

        Wisata::create([
            'kota_kode' => '3374',
            'nama_wisata' => 'Museum Lawang Sewu Semarang',
            'alamat_wisata' => 'Jl. Pemuda No.160, Sekayu, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50132',
            'jam_buka' => '08:00',
            'jam_tutup' => '20:00',
            'tarif_masuk_wisata' => 20000,
            'tarif_parkir' => 10000,
            'titik_lokasi' => '-6.9839838,110.4095893'
        ]);

        // wisata di DI Yogyakarta
        Wisata::create([
            'kota_kode' => '3471',
            'nama_wisata' => 'Candi Prambanan',
            'alamat_wisata' => 'JJl. Raya Solo - Yogyakarta No.16, Kranggan, Bokoharjo, Kec. Prambanan, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55571',
            'jam_buka' => '06:00',
            'jam_tutup' => '17:00',
            'tarif_masuk_wisata' => 50000,
            'tarif_parkir' => 15000,
            'titik_lokasi' => '-7.751976,110.4905482'
        ]);
    }
}
