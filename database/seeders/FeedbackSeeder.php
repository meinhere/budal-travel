<?php

namespace Database\Seeders;

use App\Models\Feedback;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Feedback::create([
            'ulasan' => 'Sangat baik',
            'created_at' => '2021-08-01 00:00:00',
            'updated_at' => '2021-08-01 00:00:00',
        ]);

        Feedback::create([
            'ulasan' => 'Sangat Buruk',
            'created_at' => '2021-08-01 00:00:00',
            'updated_at' => '2021-08-01 00:00:00',
        ]);

        Feedback::create([
            'ulasan' => 'Sangat Puas',
            'created_at' => '2021-08-01 00:00:00',
            'updated_at' => '2021-08-01 00:00:00',
        ]);

        Feedback::create([
            'ulasan' => 'Sangat Tidak Puas',
            'created_at' => '2021-08-01 00:00:00',
            'updated_at' => '2021-08-01 00:00:00',
        ]);
        
    }
}
