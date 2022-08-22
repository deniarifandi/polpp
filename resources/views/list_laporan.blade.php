
  
  @extends('layouts.main')

  @section('title','data pelanggaran')

  @section('content')

    @include('style.table_style')

    <div class="pagetitle">
      <h1>Dashboard Laporan Pelanggaran</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard Laporan Pelanggaran</li>
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
            
              
                <div>
                    <div class="table-responsive">
                        <div class="table-wrapper">     
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="show-entries">
                                            <span>Show</span>
                                            <select>
                                                <option>5</option>
                                                <option>10</option>
                                                <option>15</option>
                                                <option>20</option>
                                            </select>
                                            <span>entries</span>
                                        </div>            
                                    </div>
                                    <div class="col-sm-4">
                                        <h2 class="text-center">Data Laporan <b>Pelanggaran</b></h2> 
                                    </div>
                                   
                                    <div class="col-sm-2 offset-sm-2">
                                      <div class="input-group mb-3">
                                      <input type="text" class="form-control" placeholder="Cari Data" aria-label="Recipient's username" aria-describedby="basic-addon2" disabled="">
                                      <div class="input-group-append">
                                        <button class="btn btn-secondary" type="button" disabled=""><i class="bi bi-search"></i>
                                        </button>
                                      </div>
                                    </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <table class="table table-bordered" id="list_pelanggaran">
                            <thead>
                              <tr>
                                <th scope="col">Nama Pelapor<i class="fa fa-sort"></i></th>
                                <th scope="col">email</th>
                                {{-- <th scope="col">Pemilik / Vendor</th> --}}
                                <th scope="col">NIK</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Pesan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col"> Status </th>
                                <th>Tindakan</th>

                              </tr>
                            </thead>
                            <tbody>
                              
                              @foreach($pelanggarans as $pelanggaran)
                                
                                <tr>
                                  <td>{{ $pelanggaran->nama}}</td>
                                  <td>{{ $pelanggaran->email}}</td>
                                  {{-- <td>{{ $pelanggaran->nama_pemilik}}</td> --}}
                                  <td>{{ $pelanggaran->nik}}</td>
                                  <td>{{ $pelanggaran->subjek}}</td>
                                  <td>{{ $pelanggaran->pesan}}</td>
                                  <td>{{ date_format(date_create($pelanggaran->created_at), "d-M-Y") }}</td>
                                  <td>
                                    @if($pelanggaran->status == 1)
                                    <button type="button" class="btn btn-primary btn-sm" style="background-color: #0d6efd;" disabled="true">OnProcess</button>
                                    @else
                                    <button type="button" class="btn btn-success btn-sm" style="background-color: #009b52;" disabled="true">Sudah Diproses</button>
                                    @endif
                                  </td>
                                  <td>
                                   {{--  <a class="btn btn-primary btn-sm" href="{{ url('pelanggaran') }}/{{ $pelanggaran->id }}">Detail</a> 
                                    <button class="btn btn-warning btn-sm" onclick="underConstruction()" disabled="disabled">Edit</button> 
                                    <button class="btn btn-danger btn-sm" onclick="underConstruction()" disabled="disabled">Delete</button> --}}
                                    <a class="btn btn-warning view btn-sm" style="color:white" title="View" data-toggle="tooltip"  href="{{ url('laporan/detail') }}/{{ $pelanggaran->id }}"><i class="material-icons">&#xE417;</i></a>
                                    {{-- <a href="#" class="edit" title="Edit" data-toggle="tooltip" onclick="underConstruction()"><i class="material-icons">&#xE254;</i></a> --}}
                                    {{-- <a href="#" class="delete" title="Delete" data-toggle="tooltip" onclick="underConstruction()"><i class="material-icons">&#xE872;</i></a> --}}
                                  </td>
                                </tr>

                              @endforeach
                      
                            </tbody>

                          </table>
                           <div class="clearfix">
                              <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                              <ul class="pagination">
                                    <li id="prevLi" class="page-item"><a id="prevButton" class="page-link" >Previous</a></li>
                                      @for($i = 1; $i <= $pelanggarans->lastPage(); $i++)
                                    <li id="pageLi[{{$i}}]" class="page-item"><a id="pageButton[{{$i}}]" class="page-link" href="{{ $pelanggarans->url($i)}}" >{{$i}}</a></li>
                                      @endfor

                                    <li id="nextLi" class="page-item"><a id="nextButton" class="page-link" >Next</a></li>
                                
                              </ul>
                          </div>
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
      
      $(document).ready(function () {

          var prevButton = document.getElementById("prevButton");
          prevButton.href="{{$pelanggarans->previousPageUrl()}}";
          var nextButton = document.getElementById("nextButton");
          nextButton.href="{{$pelanggarans->nextPageUrl()}}";
          var pageLi = document.getElementById("pageLi[{{ $pelanggarans->currentPage() }}]");
          pageLi.classList.add("active");
         

        if ({{$pelanggarans->currentPage()}} <= 1) {
            var prevLi = document.getElementById("prevLi");
            prevLi.classList.add("disabled");
        }else if({{$pelanggarans->currentPage()}} >= {{ $pelanggarans->lastPage() }}){
            
            var nextLi = document.getElementById("nextLi");
            nextLi.classList.add("disabled");
        }

      });

    </script>

    @endsection