
  
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
                
                {{-- <br> --}}
                {{-- <h4>Filter</h4> --}}
                
               {{--  <div class="row">
                  <div class="col-lg-3">
                    <select class="form-select" aria-label="Default select example" name="id_jenis_laporan">
                      <option value="1" selected>Laporan Hasil Kegiatan (LHK)</option>
                    </select>   
                  </div>
                </div>
                  --}}
              
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
                                      <div class="input-group mb-3" style="display: none;">
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
                                <th>ID Laporan</th>
                                
                                <th scope="col">Tanggal</th>
                                
                                {{-- REKLAME --}}
                                @if($_GET['id_kegiatan']==1)
                                <th>Tema Reklame</th>
                                <th>Pemilik Reklame</th>
                                <th>Jenis Reklame</th>
                                @endif
                                {{-- ENDREKLAME --}}

                                
                                {{-- PKL --}}
                                @if($_GET['id_kegiatan']==2)
                                <th>Media PKL</th>
                                <th>Nama Pemilik</th>
                                <th>No.Identitas(NIK/No.SIM .dll)</th>
                                <th>Lokasi Pelanggaran</th>
                                {{-- END PKL --}}
                                @endif

                                {{-- Anjal Gepeng --}}
                                @if($_GET['id_kegiatan']==3)
                                <th>Jenis Anjal/Gepeng</th>
                                <th>Nama</th>
                                <th>No.ID</th>

                                @endif
                                {{-- Anjal Gepeng --}}

                                {{-- PSK --}}
                                @if($_GET['id_kegiatan']==4)
                                <th>Nama PSK</th>
                                <th>No. Identitas</th>
                                @endif
                                {{-- PSK --}}

                                {{-- MINOL --}}
                                @if($_GET['id_kegiatan']==5)
                                <th>Nama</th>
                                <th>No. Identitas</th>
                                <th>Golongan</th>
                                <th>No.Ijin Operasional</th>
                                @endif
                                {{-- MINOL --}}

                                 {{-- PEMONDOKAN --}}
                                @if($_GET['id_kegiatan']==6)
                                <th>Nama Pemondokan</th>
                                <th>No.Identitas</th>
                                @endif
                                {{-- PEMONDOKAN --}}

                                {{-- PARKIR LIAR --}}
                                @if($_GET['id_kegiatan']==7)
                                <th>Nama Parkir Liar</th>
                                <th>No. Identitas</th>
                                @endif
                                {{-- PARKIR LIAR --}}

                                {{-- PROKES --}}
                                @if($_GET['id_kegiatan']==8)
                                <th>Jenis Prokes</th>
                                <th>Nama Usaha</th>
                                <th>Nomor Surat</th>
                                <th>Nama Pelaku</th>
                                <th>No.Identitas</th>
                                @endif
                                {{-- PROKES --}}

                                <th scope="col">Jenis Pelanggaran</th>
                                <th>Tindak Lanjut</th>
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
                                  <td>{{ $pelanggaran->id }}</td>
                                  
                                  <td>{{ date( "d-M-Y H:i:s", strtotime( $pelanggaran->created_at ) + 7 * 3600 ); }}</td>

                                  {{-- REKLAME --}}
                                  @if($_GET['id_kegiatan']==1)
                                  <td>{{ $pelanggaran->tema_reklame}}</td>
                                  <td>{{ $pelanggaran->nama_vendor }}</td>
                                  <td>{{ $pelanggaran->jenis_reklame }}</td>
                                  @endif
                                  {{-- ENDREKLAME --}}

                                  {{-- PKL --}}
                                  @if($_GET['id_kegiatan']==2)
                                  <td>{{ $pelanggaran->jenis_pkl }}</td>
                                  <td>{{ $pelanggaran->pkl_nama }}</td>
                                  <td>{{ $pelanggaran->pkl_no_identitas }}</td>
                                  <td>{{ $pelanggaran->alamat }}</td>
                                  {{-- end PKL --}}
                                  @endif

                                  {{-- Anjal Gepeng --}}
                                  @if($_GET['id_kegiatan']==3)
                                  <td>{{$pelanggaran->jenis_anjal}}</td>
                                  <td>{{$pelanggaran->anjal_gepeng_nama}}</td>
                                  <td>{{$pelanggaran->anjal_gepeng_no_identitas}}</td>
                                  @endif
                                  {{-- Anjal Gepeng --}}

                                  {{-- PSK --}}
                                  @if($_GET['id_kegiatan']==4)
                                  <td>{{$pelanggaran->psk_nama}}</td>
                                  <td>{{$pelanggaran->psk_no_identitas}}</td>
                                  @endif
                                  {{-- PSK --}}

                                  {{-- MINOL --}}
                                  @if($_GET['id_kegiatan']==5)
                                  <td>{{ $pelanggaran->minol_nama }}</td>
                                  <td>{{ $pelanggaran->minol_no_identitas }}</td>
                                  <td>{{ $pelanggaran->psk_kelamin }}</td>
                                  <td>{{ $pelanggaran->pemondokan_no_identitas }}</td>
                                  @endif
                                  {{-- MINOL --}}

                                   {{-- PEMONDOKAN --}}
                                  @if($_GET['id_kegiatan']==6)
                                  <td>{{ $pelanggaran->pemondokan_nama }}</td>
                                  <td>{{ $pelanggaran->pemondokan_no_identitas }}</td>
                                  @endif
                                  {{-- PEMONDOKAN --}}

                                  {{-- PARKIR LIAR --}}
                                  @if($_GET['id_kegiatan']==7)
                                  <td>{{ $pelanggaran->parkir_nama }}</td>
                                  <td>{{ $pelanggaran->parkir_no_identitas }}</td>
                                  @endif
                                  {{-- PARKIR LIAR --}}

                                  {{-- PROKES --}}
                                  @if($_GET['id_kegiatan']==8)
                                  <th></th>
                                  <th>{{ $pelanggaran->parkir_no_identitas }}</th>
                                  <th>{{ $pelanggaran->parkir_nama }}</th>
                                  <th>{{ $pelanggaran->prokes_nama }}</th>
                                  <th>{{ $pelanggaran->prokes_no_identitas }}</th>
                                  @endif
                                  {{-- PROKES --}}


                                  <td>{{ $pelanggaran->nama_pelanggaran}}</td>
                                  <td>{{ $pelanggaran->nama_tindak_lanjut }}</td>
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