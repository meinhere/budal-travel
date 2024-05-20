<?php

namespace Database\Seeders;

use App\Models\Bus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        /*
        * Jetbus 3+ Voyager
        */

        Bus::create([
            'kategori_kode' => 'KB01',
            'status_bus_kode' => '1',
            'nama_bus' => 'Jetbus 3+ Voyager',
            'kapasitas_solar' => '270',
            'jumlah_kursi' => 60,
            'harga_sewa' => 6000000,
            'kecepatan' => '115'
        ]);
        
        Bus::create([
            'kategori_kode' => 'KB01',
            'status_bus_kode' => '2',
            'nama_bus' => 'Jetbus 3+ Voyager',
            'kapasitas_solar' => '270',
            'jumlah_kursi' => 60,
            'harga_sewa' => 6000000,
            'kecepatan' => '115'
        ]);

        Bus::create([
            'kategori_kode' => 'KB01',
            'status_bus_kode' => '1',
            'nama_bus' => 'Jetbus 3+ Voyager',
            'kapasitas_solar' => '270',
            'jumlah_kursi' => 60,
            'harga_sewa' => 6000000,
            'kecepatan' => '115'
        ]);

        Bus::create([
            'kategori_kode' => 'KB01',
            'status_bus_kode' => '1',
            'nama_bus' => 'Jetbus 3+ Voyager',
            'kapasitas_solar' => '270',
            'jumlah_kursi' => 60,
            'harga_sewa' => 6000000,
            'kecepatan' => '115'
        ]);

        Bus::create([
            'kategori_kode' => 'KB01',
            'status_bus_kode' => '1',
            'nama_bus' => 'Jetbus 3+ Voyager',
            'kapasitas_solar' => '270',
            'jumlah_kursi' => 60,
            'harga_sewa' => 6000000,
            'kecepatan' => '115'
        ]);

        /*
        * Jetbus 5
        */

        Bus::create([
            'kategori_kode' => 'KB02',
            'status_bus_kode' => '1',
            'nama_bus' => 'Jetbus 5',
            'kapasitas_solar' => '350',
            'jumlah_kursi' => 60,
            'harga_sewa' => '8000000',
            'kecepatan' => '127'
        ]);

        Bus::create([
            'kategori_kode' => 'KB02',
            'status_bus_kode' => '1',
            'nama_bus' => 'Jetbus 5',
            'kapasitas_solar' => '350',
            'jumlah_kursi' => 60,
            'harga_sewa' => '8000000',
            'kecepatan' => '127'
        ]);

        Bus::create([
            'kategori_kode' => 'KB02',
            'status_bus_kode' => '2',
            'nama_bus' => 'Jetbus 5',
            'kapasitas_solar' => '350',
            'jumlah_kursi' => 60,
            'harga_sewa' => '8000000',
            'kecepatan' => '127'
        ]);
    }
}
