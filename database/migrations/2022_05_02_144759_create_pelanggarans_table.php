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
            $table->tinyInteger('tema_reklame')->nullable();
            $table->tinyInteger('id_pemilik')->nullable();
            $table->tinyInteger('id_jenis_reklame')->nullable();
            $table->tinyInteger('id_jumlah_reklame')->nullable();
            $table->tinyInteger('id_jenis_pelanggaran')->nullable();
            $table->tinyInteger('id_tindak_lanjut')->nullable();
            $table->tinyInteger('id_propinsi')->nullable();
            $table->tinyInteger('id_kab_kota')->nullable();
            $table->tinyInteger('id_kecamatan')->nullable();
            $table->tinyInteger('id_kelurahan')->nullable();
            $table->string('alamat')->nullable();

            $table->string('image')->nullable();
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
