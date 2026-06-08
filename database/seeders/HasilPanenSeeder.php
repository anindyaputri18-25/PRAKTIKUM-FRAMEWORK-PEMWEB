<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HasilPanenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //
        DB::table('hasil_panens')->insert([
            [
                'nama_komoditas' => 'Padi',
                'jumlah_kg' => 1000,
                'tanggal_panen' => '2026-07-01',
            ],
            [
                'nama_komoditas' => 'Jagung',
                'jumlah_kg' => 500,
                'tanggal_panen' => '2026-08-05',
            ],
            [
                'nama_komoditas' => 'Kedelai',
                'jumlah_kg' => 300,
                'tanggal_panen' => '2026-09-10',
            ]
        ]);
    }
}
