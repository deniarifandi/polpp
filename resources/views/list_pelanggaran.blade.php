
  
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

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Berhasil tambah Data Pelanggaran
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

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
                    {{-- <th scope="col">Pemilik / Vendor</th> --}}
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
                      <td>{{ $pelanggaran->nama_regu}}</td>
                      <td>{{ $pelanggaran->nama_kegiatan}}</td>
                      {{-- <td>{{ $pelanggaran->nama_pemilik}}</td> --}}
                      <td>{{ $pelanggaran->nama_pelanggaran}}</td>
                      <td>{{ $pelanggaran->nama_tindak_lanjut}}</td>
                      <td>{{ date_format(date_create($pelanggaran->tgl_peristiwa), "d-M-Y") }}</td>
                      <td>
                        <button class="btn btn-primary" onclick="underConstruction()">Detail</button> 
                        <button class="btn btn-warning" onclick="underConstruction()">Edit</button> 
                        <button class="btn btn-danger" onclick="underConstruction()">Delete</button>
                      </td>
                    </tr>

                  @endforeach

                </tbody>
              </table>

              <a class="btn btn-success pull-right" href="{{ url('pelanggaran/create')}}/@php 
                if(isset($_GET['id_kegiatan'])){ 
                  echo '?id_kegiatan='.$_GET['id_kegiatan'];
                }
              @endphp">
              Tambah Data</a>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div><!-- End Left side columns -->

        <!-- Right side columns -->
       
      </div>
    </section>


    @endsection