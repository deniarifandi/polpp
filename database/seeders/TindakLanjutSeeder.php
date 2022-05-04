<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TindakLanjutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tindak_lanjuts')->insert([[
            'nama' => "Diamankan di kantor SatPolPP Kota Malang"
        ],[
            'nama' => "Diambil Oleh Pemiliknya"
        ],[
            'nama' => "Diserahkan ke PPNS untuk di BAP"
        ],[
            'nama' => "Pemberian Surat Peringatan"
        ]]);
    }
}
