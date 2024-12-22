<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Jenis;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('jenis')->insert([
        // ]);

        // Jenis::factory()->count(3)->create();
        DB::table('jenis')->insert([
            ['jenis' => 'Kandang 1', 'kode' => 'K01'],
            ['jenis' => 'Kandang 2', 'kode' => 'K02'],
            ['jenis' => 'Kandang 3', 'kode' => 'K03'],
            ['jenis' => 'Kandang 4', 'kode' => 'K04'],
            ['jenis' => 'Kandang 5', 'kode' => 'K05'],
            ['jenis' => 'Kandang 6', 'kode' => 'K06'],
        ]);
    }
}
