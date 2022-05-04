
  
  @extends('layouts.main')

  @section('title','data pelanggaran')

  @section('content')
  

    <div class="pagetitle">
      <h1>Dashboard Pelanggaran</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard Pelanggaran</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
             <div class="card">
            <div class="card-body">
              <h5 class="card-title">Rekapitulasi</h5>
              <p>Rekapitulasi Data Pelanggaran</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    {{-- <th scope="col">#</th> --}}
                    {{-- <th scope="col">Jenis Laporan</th> --}}
                    <th scope="col">Regu</th>
                    <th scope="col">Kegiatan</th>
                    <th scope="col">Pemilik / Vendor</th>
                    <th scope="col">Jenis Pelanggaran</th>
                    <th scope="col">Tindak Lanjut</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    // print_r($pelanggarans[0]);
                  @endphp
                  @foreach(json_decode($pelanggarans) as $pelanggaran)
                    
                    <tr>
                      {{-- <th>{{ $pelanggaran->id}}</th> --}}
                      <td>{{ $pelanggaran->id_regu}}</td>
                      <td>{{ $pelanggaran->id_kegiatan}}</td>
                      <td>{{ $pelanggaran->id_pemilik}}</td>
                      <td>{{ $pelanggaran->id_jenis_pelanggaran}}</td>
                      <td>{{ $pelanggaran->id_tindak_lanjut}}</td>
                      <td>{{ $pelanggaran->tgl_peristiwa}}</td>
                      <td><button class="btn btn-warning">Edit</button> <button class="btn btn-danger">Delete</button></td>
                    </tr>

                  @endforeach

                </tbody>
              </table>

              <a class="btn btn-success pull-right" href="{{ url('pelanggaran/create')}}">Tambah Data</a>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div><!-- End Left side columns -->

        <!-- Right side columns -->
       
      </div>
    </section>


    @endsection