<?php

namespace Database\Seeders;

use App\Models\Login;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Login::create([
            'username' => 'ronggo',
            'password' => bcrypt('12345')
        ]);

        Login::create([
            'username' => 'akhyar',
            'password' => bcrypt('12345')
        ]);

        Login::create([
            'username' => 'huda',
            'password' => bcrypt('12345')
        ]);
    }
}
