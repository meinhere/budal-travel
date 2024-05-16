<?php

namespace Database\Seeders;

use App\Models\KategoriFeedback;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriFeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriFeedback::create([
            'tanggapan' => 'Senang',
        ]);

        KategoriFeedback::create([
            'tanggapan' => 'Tidak Senang'
        ]);

        KategoriFeedback::create([
            'tanggapan' => 'Biasa'
        ]);
    }
}
