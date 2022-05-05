<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kecamatans')->insert([[
            'nama' => "Klojen"
        ],[
            'nama' => "Blimbing"
        ],[
            'nama' => "Lowokwaru"
        ],[
            'nama' => "Sukun"
        ],[
            'nama' => "Kedungkandang"
        ]]);
    }
}
