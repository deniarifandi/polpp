<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendors')->insert([[
            'nama' => "Meteor Cell",
            'jenis' => 1,
        ],[
            'nama' => "SuperIndo Supermarket",
            'jenis' => 1,
        ],[
            'nama' => "Alibaba Original Store",
            'jenis' => 1,
        ],[
            'nama' => "GreenOrchid Residence",
            'jenis' => 1,
        ],[
            'nama' => "Adicipta",
            'jenis' => 1,
        ],[
            'nama' => "Bangun Indah Graha",
            'jenis' => 1,
        ],[
            'nama' => "SuperIndo Supermarket",
            'jenis' => 1,
        ],[
            'nama' => "Alfamart",
            'jenis' => 1,
        ],[
            'nama' => "Yamaha",
            'jenis' => 1,
        ],[
            'nama' => "Honda",
            'jenis' => 1,
        ],[
            'nama' => "Hijab Mandhja",
            'jenis' => 1,
        ],[
            'nama' => "Rumah Zakat",
            'jenis' => 1,
        ],[
            'nama' => "Kapal Api",
            'jenis' => 1,
        ],[
            'nama' => "Hj Mak Erot",
            'jenis' => 1,
        ],[
            'nama' => "Nurul Hidayat",
            'jenis' => 1,
        ],[
            'nama' => "Perumahan Batubara",
            'jenis' => 1,
        ],[
            'nama' => "Pia Cap Mangkok",
            'jenis' => 1,
        ],[
            'nama' => "Smartfren",
            'jenis' => 1,
        ],[
            'nama' => "Rumah Zakat",
            'jenis' => 1,
        ],[
            'nama' => "Mitra 10",
            'jenis' => 1,
        ],[
            'nama' => "Prima Land",
            'jenis' => 1,
        ],[
            'nama' => "Excelso",
            'jenis' => 1,
        ],[
            'nama' => "Maxim",
            'jenis' => 1,
        ]]);
    }
}
