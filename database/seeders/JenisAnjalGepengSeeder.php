<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class JenisAnjalGepengSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('jenis_anjal_gepengs')->insert([[
            'nama' => 'Gelandangan',
        ],[
            'nama' => 'Pengemis',
        ],[
            'nama' => 'Pengamen',
        ],[
            'nama' => 'Badut',
        ],[
            'nama' => 'Peminta Sumbangan',
        ],[
            'nama' => 'Manusia Silver',
        ]]);
    }
}
