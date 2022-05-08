<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            JenisReklameSeeder::class,
            JenisPelanggaranSeeder::class,
            KegiatanSeeder::class,
            TindakLanjutSeeder::class,
            UkuranReklameSeeder::class,
            ReguSeeder::class,
            VendorSeeder::class,
            KecamatanSeeder::class,
            KelurahanSeeder::class,
            JenisPklSeeder::class,
            JenisAnjalGepengSeeder::class,
            JenisPenertibanProkesSeeder::class,
        ]);
    }
}
