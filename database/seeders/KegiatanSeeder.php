<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kegiatans')->insert([[
            'nama' => "Penertiban Reklame"
        ],[
            'nama' => "Penertiban PKL"
        ],[
            'nama' => "Penertiban Anjal / GePeng"
        ],[
            'nama' => "Penertiban PSK"
        ],[
            'nama' => "Penertiban Minol"
        ],[
            'nama' => "Penertiban Pemondokan"
        ],[
            'nama' => "Penertiban Parkir Liar"
        ],[
            'nama' => "Penertiban Prokes"
        ]]);
    }
}
