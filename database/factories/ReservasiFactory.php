<?php

namespace Database\Factories;

use App\Models\Bus;
use App\Models\Kota;
use App\Models\Pelanggan;
use App\Models\StatusReservasi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservasi>
 */
class ReservasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'login_id' => $this->faker->randomElement(Pelanggan::pluck('login_id')->toArray()),
            'bus_kode' => $this->faker->randomElement(Bus::pluck('kode_bus')->toArray()),
            'status_reservasi_kode' => $this->faker->randomElement(StatusReservasi::pluck('kode_status')->toArray()),
            'kota_kode' => $this->faker->randomElement(Kota::pluck('kode_kota')->toArray()),
            'snap_token' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'waktu_reservasi' => $this->faker->dateTime(),
            'waktu_bayar' => $this->faker->dateTime(),
            'metode_bayar' => $this->faker->creditCardType(),
            'jumlah_penumpang' => $this->faker->numberBetween(1, 100),
            'jumlah_makan' => $this->faker->numberBetween(1, 3),
            'harga_makan' => $this->faker->randomElement([10000, 15000, 20000, 25000]),
            'tarif_masuk' => $this->faker->randomElement(['ya', 'tidak']),
            'titik_awal' => $this->faker->word,
            'jam_berangkat' => $this->faker->time(),
        ];
    }
}
