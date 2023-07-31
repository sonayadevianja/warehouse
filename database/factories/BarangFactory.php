<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Jenis;
use App\Models\barangmasuk;
use App\Models\barangkeluar;
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
            // 'barangmasuk_id' => barangmasuk::factory(),
            // 'barangkeluar_id'=> barangkeluar::factory(),
            'stok' => $this->faker->numberBetween(25, 50),
            'deskripsi' => fake()->sentence(),
        ];
    }
}
