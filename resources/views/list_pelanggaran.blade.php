
  
  @extends('layouts.main')

  @section('title','data pelanggaran')

  @section('content')

    @include('style.table_style')

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
                                    <div class="col-sm-2">
                                        <h2 class="text-center">Data <b>Pelanggaran</b></h2> 
                                    </div>
                                    <div class="col-sm-2">
                                        
                                        <a class="btn btn-primary pull-right col-lg-12" href="{{ url('pelanggaran/create')}}/@php 
                                          if(isset($_GET['id_kegiatan'])){ 
                                            echo '?id_kegiatan='.$_GET['id_kegiatan'];
                                          }
                                        @endphp">
                                        Tambah Data</a>

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
                                <th scope="col">Regu <i class="fa fa-sort"></i></th>
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
                                
                                <form id="deleteForm[{{ $pelanggaran->id }}]" style="max-width: 19px; margin: 0px" method="POST" action="{{ route('pelanggaran.destroy', $pelanggaran->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                               
                                </form>

                                <tr>
                                  <td>{{ $pelanggaran->nama_regu}}</td>
                                  <td>{{ $pelanggaran->nama_kegiatan}}</td>
                                  {{-- <td>{{ $pelanggaran->nama_pemilik}}</td> --}}
                                  <td>{{ $pelanggaran->nama_pelanggaran}}</td>
                                  <td>{{ $pelanggaran->nama_tindak_lanjut}}</td>
                                  <td>{{ date_format(date_create($pelanggaran->tgl_peristiwa), "d-M-Y") }}</td>
                                  <td>
                                  
                                    <a class="view" title="View" data-toggle="tooltip"  href="{{ url('pelanggaran') }}/{{ $pelanggaran->id }}"><i class="material-icons">&#xE417;</i></a>

                                    
                                    <a href="{{ url('pelanggaran')}}/edit/{{ $pelanggaran->id }}" type="submit" class="edit" title="Edit"><i class="material-icons">&#xE254;</i></a>
                                    
                                    
                                    
                                    <a href="#" class="delete" title="Delete" data-toggle="tooltip"onclick="myFunction({{ $pelanggaran->id }})"><i class="material-icons">&#xE872;</i></a>

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
                                    <li id="pageLi[{{$i}}]" class="page-item"><a id="pageButton[{{$i}}]" class="page-link" href="{{ $pelanggarans->url($i)}}@if($id_kegiatan != 0)&id_kegiatan={{ $id_kegiatan }} @endif" >{{$i}}</a></li>
                                      @endfor

                                    <li id="nextLi" class="page-item"><a id="nextButton" class="page-link" >Next</a></li>
                                
                              </ul>
                          </div>
                        </div>
                    </div>
                </div>


    

           {{--     <div class="row">
                  
                  <div class="col-lg-6">
                      Showing 1 to 10 of {{$pelanggarans->count()}} Entries
                  </div>              

                  <div class="col-lg-6">
                       <nav aria-label="Page navigation example">
                          <ul class="pagination justify-content-end">

                            @if($pelanggarans->currentPage() > 1)
                            <li class="page-item"><a class="page-link" href="{{$pelanggarans->previousPageUrl()}}@if($id_kegiatan != 0)&id_kegiatan={{ $id_kegiatan }} @endif">Previous</a></li>
                            @else
                            <li class="page-item disabled"><a class="page-link" href="#" type="button">Previous</a></li>
                            @endif

                            @for($i = 1; $i <= $pelanggarans->lastPage(); $i++)
                              @if($pelanggarans->currentPage() == $i)
                                <li class="page-item active"><a class="page-link" href="{{ $pelanggarans->url($i)}}@if($id_kegiatan != 0)&id_kegiatan={{ $id_kegiatan }} @endif">{{$i}}</a></li>
                              @else
                                <li class="page-item"><a class="page-link" href="{{ $pelanggarans->url($i)}}@if($id_kegiatan != 0)&id_kegiatan={{ $id_kegiatan }} @endif">{{$i}}</a></li>
                              @endif
                            @endfor
                              
                            @if($pelanggarans->currentPage() == $pelanggarans->lastPage())
                            <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                            @else
                            <li class="page-item"><a class="page-link" href="{{$pelanggarans->nextPageUrl()}}@if($id_kegiatan != 0)&id_kegiatan={{ $id_kegiatan }} @endif">Next</a></li>
                            @endif                  
                            
                          </ul>

                        </nav><!-- End Basic Pagination -->

                  </div>  

               </div> --}}


             {{--  <a class="btn btn-success pull-right" href="{{ url('pelanggaran/create')}}/@php 
                if(isset($_GET['id_kegiatan'])){ 
                  echo '?id_kegiatan='.$_GET['id_kegiatan'];
                }
              @endphp">
              Tambah Data</a> --}}


              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div><!-- End Left side columns -->

        <!-- Right side columns -->
       
      </div>
    </section>


      


    <script type="text/javascript">
      
      $(document).ready(function () {

          var prevButton = document.getElementById("prevButton");
          prevButton.href="{{$pelanggarans->previousPageUrl()}}@if($id_kegiatan != 0)&id_kegiatan={{ $id_kegiatan }} @endif";
          var nextButton = document.getElementById("nextButton");
          nextButton.href="{{$pelanggarans->nextPageUrl()}}@if($id_kegiatan != 0)&id_kegiatan={{ $id_kegiatan }} @endif";
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

    <script type="text/javascript">
      

      function myFunction(idPelanggaran) {
        let text = "Yakin menghapus data ini?";
        if (confirm(text) == true) {
          document.getElementById("deleteForm["+idPelanggaran+"]").submit();
         
        } else {
          
        }
        
      }

    </script>

    @endsection