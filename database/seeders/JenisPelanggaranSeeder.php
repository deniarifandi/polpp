<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\jenis_pelanggaran;

class JenisPelanggaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $jenisPelanggaran = [
            [
            'nama' => 'Tidak Ada Izin',
            'kategori'=> 1,
            'keterangan' => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'JABONG/Izin Habis',
            'kategori'=> 1,
            'keterangan' => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'Paku Pohon',
            'kategori'=> 1,
            'keterangan' => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'Rusak',
            'kategori'=> 1,
            'keterangan' => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'Lokasi Larangan',
            'kategori'=> 1,
            'keterangan' => 'Sesuai dengan Perda/Perwal Kota Malang'
            
        ],[
            'nama' => 'Memasang di Tiang Listrik',
            'kategori'=> 1,
            'keterangan' => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'Berjualan di Kawasan Larangan',
            'kategori'  => 2,
            'keterangan'    => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'Berjualan di Trotoar',
            'kategori'  => 2,
            'keterangan'    => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'Berjualan di Bahu Jalan',
            'kategori'  => 2,
            'keterangan'    => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'Berjualan di Taman',
            'kategori'  => 2,
            'keterangan'    => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'Berjualan diluar Kawasan Pasar',
            'kategori'  => 2,
            'keterangan'    => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'Berjualan diatas Saluran Air',
            'kategori'  => 2,
            'keterangan'    => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'Berjualan di Jalur Hijau',
            'kategori'  => 2,
            'keterangan'    => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'Berjualan di Kawasan Larangan',
            'kategori'  => 2,
            'keterangan'    => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'Berjualan di Jembatan Penyebrangan',
            'kategori'  => 2,
            'keterangan'    => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'Berjualan di Kawasan Larangan',
            'kategori'  => 2,
            'keterangan'    => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'Berjualan dibawah jembatan',
            'kategori'  => 2,
            'keterangan'    => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'Berjualan di Halte',
            'kategori'  => 2,
            'keterangan'    => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'AnJal / GePeng',
            'kategori'  => 3,
            'keterangan'    => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'PSK',
            'kategori'  => 4,
            'keterangan'    => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'Minol',
            'kategori'  => 5,
            'keterangan'    => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'Illegal',
            'kategori'  => 6,
            'keterangan'    => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'Illegal',
            'kategori'  => 7,
            'keterangan'    => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'Tidak Tersedia Tempat Cuci Tangan',
            'kategori'  => 8,
            'keterangan'    => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'Tidak Tersedia Hand Sanitizer',
            'kategori'  => 8,
            'keterangan'    => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'Tidak Mengatur Jarak (antrian/meja)',
            'kategori'  => 8,
            'keterangan'    => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'Tidak Tersedia Himbauan',
            'kategori'  => 8,
            'keterangan'    => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'Tidak Tersedia Thermogun',
            'kategori'  => 8,
            'keterangan'    => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'Pengunjung melebihi kapasitas',
            'kategori'  => 8,
            'keterangan'    => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'Jam Operasional Melebihi Ketentuan',
            'kategori'  => 8,
            'keterangan'    => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'Membuka Tempat yang dilarang beroperasi',
            'kategori'  => 8,
            'keterangan'    => 'Sesuai dengan Perda/Perwal Kota Malang'
        ],[
            'nama' => 'Sesuai Prosedur / Tidak ada Pelanggaran',
            'kategori'  => 8,
            'keterangan'    => 'Sesuai dengan Perda/Perwal Kota Malang'
        ]
        ];

        jenis_pelanggaran::insert($jenisPelanggaran);

    
    }
}
