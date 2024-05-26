<?php

namespace Database\Factories;

use App\Models\Wisata;
use App\Models\Reservasi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReservasiDetail>
 */
class ReservasiDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'wisata_kode' => $this->faker->randomElement(Wisata::pluck('kode_wisata')->toArray()),
            'reservasi_kode' => $this->faker->randomElement(Reservasi::pluck('kode_reservasi')->toArray()),
            'waktu_wisata' => $this->faker->time(),
        ];
    }
}
