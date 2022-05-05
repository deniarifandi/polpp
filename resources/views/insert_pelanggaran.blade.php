
@extends('layouts.main')

@section('title','tambah pelanggaran')

@section('content')


<div class="pagetitle">
  <h1>Tambah Data Pelanggaran</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Pages</li>
      <li class="breadcrumb-item active">Blank</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">

    <div class="col-lg-12">
      <div class="card">

        <div class="card-body">

          <form action="{{ route('pelanggaran.store') }}" method="POST">
            @csrf


            <h5 class="card-title" >Detail Laporan</h5>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Jenis Laporan</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" name="id_jenis_laporan" required>
                  <option selected value="">- Pilih Jenis Laporan -</option>
                  <option value="1">Laporan Hasil Kegiatan (LKH)</option>
                  <option value="2">Laporan Kegiatan Harian(LKH)</option>
                  <option value="3">Cek Hasil Laporan</option>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Regu</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" name="id_regu" required>
                  <option selected value="">- Pilih Regu -</option>
                  @foreach($regus as $regu)
                  <option value="{{$regu->id}}">{{$regu->nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Tanggal</label>
              <div class="col-sm-8">
                <input type="date" name="tgl_peristiwa" class="form-control" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Kegiatan</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" name="id_kegiatan" required>
                  <option selected value="">- Pilih Kegiatan -</option>
                  @foreach($kegiatans as $kegiatan)
                  <option value="{{$kegiatan->id}}">{{$kegiatan->nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="col-lg-6">


        <div class="card">
          <div class="card-body">

            <h5 class="card-title" >Detail Pelanggaran</h5>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Nama/Tema Reklame</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="tema_reklame">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Pemilik / Vendor</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" name="id_pemilik" required>
                  <option selected value="">- Pilih Pemilik -</option>
                  @foreach($vendors as $vendor)
                  <option value="{{$vendor->id}}">{{$vendor->nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Jenis Reklame</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" name="id_jenis_reklame" required>
                  <option selected value="">- Pilih Jenis Reklame -</option>
                  @foreach($jenis_reklames as $jenis_reklame)
                  <option value="{{$jenis_reklame->id}}">{{$jenis_reklame->nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Ukuran Reklame</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" name="id_ukuran_reklame" required>
                  <option selected value="">- Pilih Ukuran Reklame -</option>
                  @foreach($ukuran_reklames as $ukuran_reklame)
                  <option value="{{$ukuran_reklame->id}}">{{$ukuran_reklame->nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Jumlah Reklame</label>
              <div class="col-sm-8">
                <input type="number" class="form-control" name="jumlah_reklame">
              </div>
            </div>

          </div>
        </div>


      </div>

      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">

            <h5 class="card-title" >Lokasi & tindak lanjut</h5>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Jenis Pelanggaran</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" name="id_jenis_pelanggaran" required>
                  <option selected value="">- Pilih Jenis Pelanggaran -</option>

                  @foreach($jenis_pelanggarans as $jenis_pelanggaran)
                  <option value="{{$jenis_pelanggaran->id}}">{{$jenis_pelanggaran->nama}}</option>
                  @endforeach

                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Tindak Lanjut</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" name="id_tindak_lanjut" required>
                  <option selected value="">- Pilih Jenis Tindakan -</option>

                  @foreach($tindak_lanjuts as $tindak_lanjut)
                  <option value="{{$tindak_lanjut->id}}">{{$tindak_lanjut->nama}}</option>
                  @endforeach

                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Kecamatan</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" name="id_kecamatan" required>
                  <option selected value="">- Pilih Kecamatan -</option>


                  @foreach($kecamatans as $kecamatan)
                  <option value="{{$kecamatan->id}}">{{$kecamatan->nama}}</option>
                  @endforeach

                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Kelurahan</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" name="id_kelurahan" required>
                  <option selected value="">- Pilih Kelurahan -</option>


                  @foreach($kelurahans as $kelurahan)
                  <option value="{{$kelurahan->id}}">{{$kelurahan->nama}}</option>
                  @endforeach

                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Alamat</label>
              <div class="col-sm-8">
                <input class="form-control" type="text" name="alamat">
              </div>
            </div>

          </div>
        </div>

      </div>

      <div class="col-lg-4">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Dokumentasi Foto Sebelum Penertiban</h5>

            <div class="row mb-3">
              
              <div class="col-sm-10">
                <input class="form-control" type="file" id="foto_sebelum_1" name="foto_sebelum_1">
              </div>
            </div>

            <div class="row mb-3">
              
              <div class="col-sm-10">
                <input class="form-control" type="file" id="formFile">
              </div>
            </div>

            <div class="row mb-3">
              
              <div class="col-sm-10">
                <input class="form-control" type="file" id="formFile">
              </div>
            </div>

            <div class="row mb-3">
              
              <div class="col-sm-10">
                <input class="form-control" type="file" id="formFile">
              </div>
            </div>

            <div class="row mb-3">
              
              <div class="col-sm-10">
                <input class="form-control" type="file" id="formFile">
              </div>
            </div>

          </div>
        </div>


      </div>

      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Dokumentasi Foto Setelah Penertiban</h5>

            <div class="row mb-3">
              
              <div class="col-sm-10">
                <input class="form-control" type="file" id="formFile">
              </div>
            </div>

            <div class="row mb-3">
              
              <div class="col-sm-10">
                <input class="form-control" type="file" id="formFile">
              </div>
            </div>

            <div class="row mb-3">
              
              <div class="col-sm-10">
                <input class="form-control" type="file" id="formFile">
              </div>
            </div>

            <div class="row mb-3">
              
              <div class="col-sm-10">
                <input class="form-control" type="file" id="formFile">
              </div>
            </div>

            <div class="row mb-3">
              
              <div class="col-sm-10">
                <input class="form-control" type="file" id="formFile">
              </div>
            </div>
         
        </div>
        </div>
      </div>

      <div class="col-lg-4">
         <div class="card">
          <div class="card-body">
            <h5 class="card-title">Dokumentasi Foto Sebelum Penertiban</h5>

            <div class="row mb-3">
              
              <div class="col-sm-10">
                <input class="form-control" type="file" id="foto_sebelum_1" name="foto_sebelum_1">
              </div>
            </div>

            <div class="row mb-3">
              
              <div class="col-sm-10">
                <input class="form-control" type="file" id="formFile">
              </div>
            </div>

            <div class="row mb-3">
              
              <div class="col-sm-10">
                <input class="form-control" type="file" id="formFile">
              </div>
            </div>

            <div class="row mb-3">
              
              <div class="col-sm-10">
                <input class="form-control" type="file" id="formFile">
              </div>
            </div>

            <div class="row mb-3">
              
              <div class="col-sm-10">
                <input class="form-control" type="file" id="formFile">
              </div>
            </div>

          </div>
        </div>
      </div>

      <button type="submit" class="btn btn-success">Simpan</button>

    </form><!-- End General Form Elements -->
    </div>
  </div>
</section>


@endsection