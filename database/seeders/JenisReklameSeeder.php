<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class JenisReklameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_reklames')->insert([[
            'nama' => 'Baliho',
        ],[
            'nama' => 'Balon Reklame',
        ],[
            'nama' => 'Billboard',
        ],[
            'nama' => 'Neon Box',
        ],[
            'nama' => 'Papan Nama',
        ],[
            'nama' => 'Poster',
        ],[
            'nama' => 'Spanduk / Umbul-umbul',
        ],[
            'nama' => 'Reklame Stiker',
        ],[
            'nama' => 'Vertical Banner',
        ],[
            'nama' => 'Banner',
        ],[
            'nama' => 'Konstruksi Reklame',
        ]]);
    }
}
