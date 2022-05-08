<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class JenisPklSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis_pkls')->insert([[
            'nama' => 'PKL Orang/Asongan',
        ],[
            'nama' => 'PKL Rombong',
        ],[
            'nama' => 'PKL Rombong dengan kendaraan Roda 2',
        ],[
            'nama' => 'PKL Rombong dengan kendaraan Roda 4',
        ],[
            'nama' => 'PKL Bongkar Pasang(tanpa kendaraan)',
        ],[
            'nama' => 'PKL Bongkar Pasang(dengan kendaraan)',
        ],[
            'nama' => 'PKL Tetap dengan bangunan permanan',
        ],[
            'nama' => 'PKL Tetap dengan bangunan non-permanen',
        ]]);
    }
}
