<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class ReguSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regus')->insert([[
            'nama' => "Tim Beruang"
        ],[
            'nama' => "Regu 1"
        ],[
            'nama' => "Regu 2"
        ],[
            'nama' => "Regu 3"
        ]]);
    }
}
