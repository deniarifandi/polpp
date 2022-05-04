<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggarans', function (Blueprint $table) {
            $table->id();

            //all
            $table->tinyInteger('kategori_pelanggaran')->nullable();
            $table->tinyInteger('id_jenis_laporan')->nullable();
            $table->tinyInteger('id_regu')->nullable();
            $table->tinyInteger('id_kegiatan')->nullable();

            //reklame
            $table->string('tema_reklame')->nullable();
            $table->tinyInteger('id_pemilik')->nullable();
            $table->tinyInteger('id_jenis_reklame')->nullable();
            $table->string('ukuran_reklame')->nullable();
            $table->tinyInteger('jumlah_reklame')->nullable();
            $table->date('masa_berlaku')->nullable();

            //pelanggaran & tindakan
            $table->tinyInteger('id_jenis_pelanggaran')->nullable();
            $table->tinyInteger('id_tindak_lanjut')->nullable();
            
            //detail
            $table->tinyInteger('id_propinsi')->nullable();
            $table->tinyInteger('id_kab_kota')->nullable();
            $table->tinyInteger('id_kecamatan')->nullable();
            $table->tinyInteger('id_kelurahan')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('image_sebelum')->nullable();
            $table->string('image_proses')->nullable();
            $table->string('image_setelah')->nullable();
            $table->double('lat')->nullable();
            $table->double('lon')->nullable();
            $table->date('tgl_peristiwa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelanggarans');
    }
};
