<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UkuranReklameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ukuran_reklames')->insert([[
            'nama' => "4 x 8 meter"
        ],[
            'nama' => "5 x 10 meter"
        ],[
            'nama' => "6 x 12 meter"
        ],[
            'nama' => "8 x 16 meter"
        ],[
            'nama' => "3 x 12 meter"
        ],[
            'nama' => "4 x 6 meter"
        ]]);
    }
}
