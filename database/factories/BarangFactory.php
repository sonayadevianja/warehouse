<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Jenis;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_barang' => fake()->name(),
            'tanggal_produksi' => $this->faker->date($format='Y-m-d', $max='now'),
            'jenis_id'=> Jenis::factory(),
            'tanggal_keluar' => $this->faker->date($format='Y-m-d', $max='now'),
            'tanggal_masuk'=> $this->faker->date($format='Y-m-d', $max='now'),
            'jumlah' => $this->faker->numberBetween(25, 50),
            'keterangan' => fake()->sentence(),
        ];
    }
}
