
@extends('layouts.main_can')

@section('title','tambah pelanggaran')

@section('content')

<section class="section">
  <div class="row">



    <div class="col-lg-12">
      <div class="card">

        <div class="card-body">

          <div class="pagetitle">
            <br>
            <h1>Tambah Data Pengantar SKTM</h1>
            <hr>
          </div><!-- End Page Title -->

                 <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">KTP</label>
                  <div class="col-sm-8">
                    <input type="file" class="form-control" name="jumlah_reklame" min="0">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">KK</label>
                  <div class="col-sm-8">
                    <input type="file" class="form-control" name="jumlah_reklame" min="0">
                  </div>
                </div>
                 <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Surat Pernyataan Miskin dari Kades</label>
                  <div class="col-sm-8">
                    <input type="file" class="form-control" name="jumlah_reklame" min="0">
                  </div>
                </div>
                   <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Surat Verifikasi Kriteria Keluarga Miskin </label>
                  <div class="col-sm-8">
                    <input type="file" class="form-control" name="jumlah_reklame" min="0">
                  </div>
                </div>


                  <a type="submit" href="{{ url('skck_sktm') }}" class="btn btn-success" style="float: right;">Ajukan Permohonan</a>
        </div>
      </div>
    </div>
  </div>
</section>

 


@endsection