<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kecamatan = [
            [
                'id' => '1', //id opsional
                'nama' => 'Gunung Kelua',
            ],
            [
                'id' => '2',
                'nama' => 'Sidoadi',
            ]
        ];

        foreach ($kecamatan as $kcm) {
            Kecamatan::firstOrCreate($kcm);
        }
    }
}
