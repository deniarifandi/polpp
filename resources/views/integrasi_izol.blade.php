
  
  @extends('layouts.main')

  @section('title','data pelanggaran')

  @section('content')

  @include('style.table_style')

    <div class="pagetitle">
      <h1>Dashboard Integrasi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard Integrasi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Berhasil tambah Data Pelanggaran
      
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if ($message = Session::get('successhapus'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Berhasil hapus data pelanggaran
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
             <div class="card" style="min-width: 800px">
              <div class="card-body" >
                

                  <div class="table-responsive">
                        <div class="table-wrapper">     
                            <div class="table-title">
                                <div class="row">
                                   
                                    <div class="col-sm-3 offset-sm-2">
                                        <h2 class="text-center">Integrasi Data <b>Reklame </b></h2> 
                                    </div>

                                    <div class="col-sm-2 offset-sm-1">
                                      <div class="input-group mb-3">
                                        <input type="date" class="form-control" id="tgl_awal" value="{{ date('Y-m-d') }}">
                                      </div>
                                    </div>

                                    <div class="col-sm-2">
                                      <div class="input-group mb-3">
                                        <input type="date" class="form-control" id="tgl_akhir" value="{{ date('Y-m-d') }}">
                                      </div>
                                    </div>

                                   {{--  <div class="col-sm-1">
                                      <button class="btn btn-primary">Filter</button>
                                    </div> --}}
                                   
                                    <div class="col-sm-2" >
                                      <div class="input-group mb-3">
                                      <input type="text" class="form-control" id="inputCari" placeholder="Cari Data" aria-label="Recipient's username" aria-describedby="basic-addon2" style="margin-right: 15px; display: none;">
                                      <div class="input-group-append">
                                        <button class="btn btn-warning" type="button" id="tombolCari" onclick="search()"  ><i class="bi bi-search"></i>
                                        </button>
                                      </div>
                                    </div>
                                    </div>
                                    
                                </div>
                            </div>
                              <div class="containers">
                                 <table class="table table-striped table-bordered table-sm">
                                <thead>
                                  <tr>
                                    <th class="col-2">No. Register</th>
                                    {{-- <th>Status Reklame</th> --}}
                                    <th class="col-2">Tema</th>
                                    <th class="col-1">Tgl. Berlaku Awal</th>
                                    <th class="col-1">Tgl. Berlaku Akhir</th>
                                    <th class="col-2">Alamat Reklame</th>
                                    <th class="col-2">Telepon Pemilik</th>
                                    <th class="col-2">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($responses as $response)
                                  <tr>
                                    <td>{{ $response['no_register'] }}</td>
                                    {{-- <td>{{ $response[''] }}</td> --}}
                                    <td>{{ $response['tema'] }}</td>
                                    <td>{{ $response['berlaku_awal'] }}</td>
                                    <td>{{ $response['berlaku_akhir'] }}</td>
                                    <td>{{ $response['lokasi_izin_jalan'] }}</td>
                                    <td>{{ $response['telp_pemohon'] }}</td>
                                    <td><button class="btn btn-primary">Detail</button></td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                              </div>

                               
                  </div>
                </div>
              

              </div>
          </div>

        </div><!-- End Left side columns -->

        <!-- Right side columns -->
       
      </div>
    </section>


      


    <script type="text/javascript">
      
      function search(){

        var tgl_awal = document.getElementById("tgl_awal").value;
        var tgl_akhir  = document.getElementById("tgl_akhir").value;

        location.replace('{{URL::to('/')}}/administration/get_reklame?tgl_awal='+tgl_awal+'&tgl_akhir='+tgl_akhir);

      }
      

       $(document).ready(function () {

        console.log("ready");

        var url = new URL(window.location.href);
        var tgl_awal = url.searchParams.get("tgl_awal");
        var tgl_akhir = url.searchParams.get("tgl_akhir");

        document.getElementById("tgl_awal").value = tgl_awal;
        document.getElementById("tgl_akhir").value = tgl_akhir;

      });

    </script>

    <script type="text/javascript">
      

     



    </script>

    @endsection