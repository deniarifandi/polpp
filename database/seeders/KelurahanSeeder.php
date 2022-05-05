<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelurahans')->insert([[
            'nama'      => "Klojen",
            'id_kec'    => "1"
        ],[
            'nama' => "Rampal Celaket",
            'id_kec'    => "1"
        ],[
            'nama' => "Sama'an",
            'id_kec'    => "1"
        ],[
            'nama' => "Kidul Dalem",
            'id_kec'    => "1"
        ],[
            'nama' => "Sukoharjo",
            'id_kec'    => "1"
        ],[
            'nama' => "Kasin",
            'id_kec'    => "1"
        ],[
            'nama' => "Oro-Oro Dowo",
            'id_kec'    => "1"
        ],[
            'nama' => "Bareng",
            'id_kec'    => "1"
        ],[
            'nama' => "Gading Kasri",
            'id_kec'    => "1"
        ],[
            'nama' => "Penanggungan",
            'id_kec'    => "1"
        ],[
            'nama' => "Kauman",
            'id_kec'    => "1"
        ]]);
    }
}
