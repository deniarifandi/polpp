

@extends('layouts.main')

@section('title','tambah pelanggaran')

@section('content')


    <div class="pagetitle">
      <h1>Blank Page</h1>
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
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Detail Pelanggaran</h5>
                <table class="table">
                
                <tbody>
                  <tr>
                    <th>Jenis Laporan</th>
                    <td>
                      @if($pelanggaran->id_jenis_laporan == 1)
                        Laporan Hasil Kegiatan (LHK)
                      @elseif($pelanggaran->id_jenis_laporan == 2)
                        Laporan Kegiatan Harian (LKH)
                      @else
                        Cek Hasil Laporan
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Regu</th>
                    <td>{{ $pelanggaran->regu }}</td>
                  </tr>
                  <tr>
                    <th>Tanggal</th>
                    <td>{{ $pelanggaran->tgl_peristiwa }}</td>
                  </tr>
                  <tr>
                    <th>Kegiatan</th>
                    <td>{{ $pelanggaran->kegiatan }}</td>
                  </tr>
                  <tr>
                    <th>Tema Reklame : </th>
                    <td>{{ $pelanggaran->tema_reklame }}</td>                   
                  </tr>
                  <tr>
                    <th>Pemilik / Vendor :</th>
                    <td>{{ $pelanggaran->pemilik }}</td>
                  </tr>
                   <tr>
                    <th>Jenis Reklame: </th>
                    <td>{{ $pelanggaran->jenis_reklame }}</td>
                  </tr>
                  <tr>
                    <th>Jumlah Reklame: </th>
                    <td>{{ $pelanggaran->jumlah_reklame }}</td>
                  </tr>
                  <tr>
                    <th>Jenis Pelanggaran : </th>
                    <td>{{ $pelanggaran->jenis_pelanggaran }}</td>
                  </tr>
                  <tr>
                    <th>Tindak Lanjut : </th>
                    <td>{{ $pelanggaran->tindak_lanjut }}</td>                   
                  </tr>
                  <tr>
                    <th>Lokasi : </th>
                    <td>{{ $pelanggaran->alamat }}</td>                   
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Dokumentasi Foto</h5>
           
             
                  <table class="table" >
                
                <tbody>
                 
                 <div class="row">
        <div class="col-lg-4">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Dokumentasi Foto Sebelum Penertiban</h5>

              <div class="row mb-3">
                
                <div class="col-sm-12">
                  <input class="form-control" type="file" name="foto_sebelum_[1]">
                </div>
              </div>

              <div class="row mb-3">
                
                <div class="col-sm-12">
                  <input class="form-control" type="file" name="foto_sebelum_[2]">
                </div>
              </div>

              <div class="row mb-3">
                
                <div class="col-sm-12">
                  <input class="form-control" type="file" name="foto_sebelum_[3]">
                </div>
              </div>

              <div class="row mb-3">
                
                <div class="col-sm-12">
                  <input class="form-control" type="file" name="foto_sebelum_[4]">
                </div>
              </div>

              <div class="row mb-3">
                
                <div class="col-sm-12">
                  <input class="form-control" type="file" name="foto_sebelum_[5]">
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Dokumentasi Foto Proses Penertiban</h5>

              <div class="row mb-3">
                
                <div class="col-sm-12">
                  <input class="form-control" type="file" name="foto_proses_[1]">
                </div>
              </div>

              <div class="row mb-3">
                
                <div class="col-sm-12">
                  <input class="form-control" type="file" name="foto_proses_[2]">
                </div>
              </div>

              <div class="row mb-3">
                
                <div class="col-sm-12">
                  <input class="form-control" type="file" name="foto_proses_[3]">
                </div>
              </div>

              <div class="row mb-3">
                
                <div class="col-sm-12">
                  <input class="form-control" type="file" name="foto_proses_[4]">
                </div>
              </div>

              <div class="row mb-3">
                
                <div class="col-sm-12">
                  <input class="form-control" type="file" name="foto_proses_[5]">
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
                
                <div class="col-sm-12">
                  <input class="form-control" type="file" name="foto_setelah_[1]">
                </div>
              </div>

              <div class="row mb-3">
                
                <div class="col-sm-12">
                  <input class="form-control" type="file" name="foto_setelah_[2]">
                </div>
              </div>

              <div class="row mb-3">
                
                <div class="col-sm-12">
                  <input class="form-control" type="file" name="foto_setelah_[3]">
                </div>
              </div>

              <div class="row mb-3">
                
                <div class="col-sm-12">
                  <input class="form-control" type="file" name="foto_setelah_[4]">
                </div>
              </div>

              <div class="row mb-3">
                
                <div class="col-sm-12">
                  <input class="form-control" type="file" name="foto_setelah_[5]">
                </div>
              </div>

            </div>
            </div>
        </div>  
      </div>
              
                </tbody>
              </table>
            
     
           
            </div>
          </div>

        </div>
      </div>
    </section>



@endsection