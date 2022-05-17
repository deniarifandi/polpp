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
            $table->tinyInteger('id_jenis_laporan')->nullable();
            $table->tinyInteger('id_regu')->nullable();
            $table->date('tgl_peristiwa')->nullable();
            $table->tinyInteger('id_kegiatan')->nullable();

            //reklame
            $table->string('tema_reklame')->nullable();
            $table->tinyInteger('id_pemilik')->nullable();
            $table->tinyInteger('id_jenis_reklame')->nullable();
            $table->tinyInteger('id_ukuran_reklame')->nullable();
            $table->Integer('jumlah_reklame')->nullable();
            $table->date('masa_berlaku')->nullable();

            //pkl
            $table->tinyInteger('id_jenis_pkl')->nullable();
            $table->string('pkl_nama')->nullable();
            $table->string('pkl_no_identitas')->nullable();
            $table->string('pkl_alamat')->nullable();

            //anjal-gepeng
            $table->tinyInteger('id_jenis_anjal_gepeng')->nullable();
            $table->string('anjal_gepeng_nama')->nullable();
            $table->string('anjal_gepeng_no_identitas')->nullable();

            //PSK
            $table->string('psk_nama')->nullable();
            $table->string('psk_no_identitas')->nullable();
            $table->string('psk_kelamin')->nullable();

            //minol
            $table->string('minol_nama')->nullable();
            $table->string('minol_no_identitas')->nullable();

            //pemondokan
            $table->string('pemondokan_nama')->nullable();
            $table->string('pemondokan_no_identitas')->nullable();

            //parkir
            $table->string('parkir_nama')->nullable();
            $table->string('parkir_no_identitas')->nullable();

            //prokes
            $table->tinyInteger('id_jenis_penertiban_prokes')->nullable();
            $table->tinyInteger('id_jenis_pelaku_usaha')->nullable();
            $table->string('prokes_nama')->nullable();
            $table->string('prokes_no_identitas')->nullable();


            //pelanggaran & tindakan
            $table->tinyInteger('id_jenis_pelanggaran')->nullable();
            $table->tinyInteger('id_tindak_lanjut')->nullable();
            
            //detail
            $table->tinyInteger('id_propinsi')->nullable();
            $table->tinyInteger('id_kab_kota')->nullable();

            $table->tinyInteger('id_kecamatan')->nullable();
            $table->tinyInteger('id_kelurahan')->nullable();
            $table->string('alamat')->nullable();

            $table->string('foto_sebelum1')->nullable();
            $table->string('foto_sebelum2')->nullable();
            $table->string('foto_sebelum3')->nullable();
            $table->string('foto_sebelum4')->nullable();
            $table->string('foto_sebelum5')->nullable();

            $table->string('foto_proses1')->nullable();
            $table->string('foto_proses2')->nullable();
            $table->string('foto_proses3')->nullable();
            $table->string('foto_proses4')->nullable();
            $table->string('foto_proses5')->nullable();

            $table->string('foto_setelah1')->nullable();
            $table->string('foto_setelah2')->nullable();
            $table->string('foto_setelah3')->nullable();
            $table->string('foto_setelah4')->nullable();
            $table->string('foto_setelah5')->nullable();

            $table->double('lat')->nullable();
            $table->double('lon')->nullable();

            $table->string('keterangan')->nullable();
            
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
