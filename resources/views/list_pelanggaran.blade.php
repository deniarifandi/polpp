
  
  @extends('layouts.main')

  @section('title','data pelanggaran')

  @section('content')
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>  
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>

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
             <div class="card" style="min-width: 800px">
            <div class="card-body" >
              <h5 class="card-title">Rekapitulasi</h5>
              <p>Rekapitulasi Data Pelanggaran</p>
              
              <!-- Table with stripped rows -->
              <table class="table table-striped" id="list_pelanggaran">
                <thead>
                  <tr>
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
                  
                  @foreach($pelanggarans as $pelanggaran)
                    
                    <tr>
                      <td>{{ $pelanggaran->nama_regu}}</td>
                      <td>{{ $pelanggaran->nama_kegiatan}}</td>
                      {{-- <td>{{ $pelanggaran->nama_pemilik}}</td> --}}
                      <td>{{ $pelanggaran->nama_pelanggaran}}</td>
                      <td>{{ $pelanggaran->nama_tindak_lanjut}}</td>
                      <td>{{ date_format(date_create($pelanggaran->tgl_peristiwa), "d-M-Y") }}</td>
                      <td>
                        <a class="btn btn-primary btn-sm" href="{{ url('pelanggaran') }}/{{ $pelanggaran->id }}">Detail</a> 
                        <button class="btn btn-warning btn-sm" onclick="underConstruction()" disabled="disabled">Edit</button> 
                        <button class="btn btn-danger btn-sm" onclick="underConstruction()" disabled="disabled">Delete</button>
                      </td>
                    </tr>

                  @endforeach
          
                </tbody>

              </table>

                 <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">

                  @if($pelanggarans->currentPage() > 1)
                  <li class="page-item"><a class="page-link" href="{{$pelanggarans->previousPageUrl()}}&id_kegiatan=@php echo $_GET['id_kegiatan'] @endphp">Previous</a></li>
                  @else
                  <li class="page-item disabled"><a class="page-link" href="#" type="button">Previous</a></li>
                  @endif

                  @for($i = 1; $i <= $pelanggarans->lastPage(); $i++)
                    @if($pelanggarans->currentPage() == $i)
                      <li class="page-item active"><a class="page-link" href="{{ $pelanggarans->url($i)}}$id_kegiatan=@php echo $_GET['id_kegiatan'] @endphp">{{$i}}</a></li>
                    @else
                      <li class="page-item"><a class="page-link" href="{{ $pelanggarans->url($i)}}$id_kegiatan=@php echo $_GET['id_kegiatan'] @endphp">{{$i}}</a></li>
                    @endif
                  @endfor
                    
                  @if($pelanggarans->currentPage() == $pelanggarans->lastPage())
                  <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                  @else
                  <li class="page-item"><a class="page-link" href="{{$pelanggarans->nextPageUrl()}}&id_kegiatan=@php echo $_GET['id_kegiatan'] @endphp">Next</a></li>
                  @endif                  
                  


                </ul>
              </nav><!-- End Basic Pagination -->

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



    <script type="text/javascript">
      
      $(document).ready(function () {
          // $('#list_pelanggaran').DataTable({
          //     scrollX: true,
          // });
      });

    </script>

    @endsection