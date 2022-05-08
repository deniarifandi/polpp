<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class JenisPenertibanProkesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('jenis_penertiban_prokes')->insert([[
            'nama' => 'Operasi Yustisi(sidang ditempat)',
        ],[
            'nama' => 'Operasi Gabungan',
        ],[
            'nama' => 'PPKM',
        ],[
            'nama' => 'PPKM Mikro',
        ],[
            'nama' => 'Pengecekan Izin Normal Baru',
        ]]);
    }
}
