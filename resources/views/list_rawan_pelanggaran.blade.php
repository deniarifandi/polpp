
  
  @extends('layouts.main')

  @section('title','data pelanggaran')

  @section('content')

    @include('style.table_style')

    <div class="pagetitle">
      <h1>Dashboard Rawan Pelanggaran</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard Rawan Pelanggaran</li>
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
                      <option value="1" selected>Laporan Hasil kecamatan (LHK)</option>
                    </select>   
                  </div>
                </div>
                  --}}
              
                <div>
                    <div class="table-responsive">
                        <div class="table-wrapper">     
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-4" style="visibility: hidden;">
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
                                        <h2 class="text-center">Data Rawan<b>Pelanggaran</b></h2> 
                                    </div>
                                    <div class="col-sm-2">
                                        
                                       {{--  <a class="btn btn-primary pull-right col-lg-12" href="{{ url('pelanggaran/create')}}/@php 
                                          if(isset($_GET['id_kecamatan'])){ 
                                            echo '?id_kecamatan='.$_GET['id_kecamatan'];
                                          }
                                        @endphp">
                                        Tambah Data</a> --}}

                                    </div>
                                    <div class="col-sm-2 offset-sm-2">
                                      <div class="input-group mb-3">
                                      <input type="text" class="form-control" id="inputCari" placeholder="Cari Data" aria-label="Recipient's username" aria-describedby="basic-addon2" >
                                      <div class="input-group-append">
                                        <button class="btn btn-warning" type="button" id="tombolCari" onclick="search()"  ><i class="bi bi-search"></i>
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
                               <th>Jenis Pelanggaran</th> 
                               

                                {{-- REKLAME --}}
                                
                                <th>Alamat</th>
                              
                                <th>Kecamatan</th>
                                
                                {{-- ENDREKLAME --}}

                             

                                
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              
                              @foreach($pelanggarans as $pelanggaran)
                                
                               

                                <tr>
                                  <td>{{ $pelanggaran->id }}</td>
                                  
                                  <td>{{ date( "d-M-Y H:i:s", strtotime( $pelanggaran->created_at ) + 7 * 3600 ); }}</td>

                                  <td>{{ $pelanggaran->nama_pelanggaran }}</td>
                                  <td>{{ $pelanggaran->alamat }}</td>
                                  <td>{{ $pelanggaran->nama_kecamatan }}</td>
                                 

                                 
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
                                    <li id="pageLi[{{$i}}]" class="page-item"><a id="pageButton[{{$i}}]" class="page-link" href="{{ $pelanggarans->url($i)}}@if($id_kecamatan != 0)&id_kecamatan={{ $id_kecamatan }} @endif" >{{$i}}</a></li>
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
          prevButton.href="{{$pelanggarans->previousPageUrl()}}@if($id_kecamatan != 0)&id_kecamatan={{ $id_kecamatan }} @endif";
          var nextButton = document.getElementById("nextButton");
          nextButton.href="{{$pelanggarans->nextPageUrl()}}@if($id_kecamatan != 0)&id_kecamatan={{ $id_kecamatan }} @endif";
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

      function search(value){
        var cari = document.getElementById('inputCari').value;

        if (cari.length > 2) {
          @if(isset($_GET['id_kecamatan']))
          var id_kecamatan = @php echo $_GET['id_kecamatan'] @endphp;
          @endif
          window.location.replace("{{ URL('/pelanggaran') }}?id_kecamatan="+id_kecamatan+'&cari='+cari);
          console.log("{{ URL('/pelanggaran') }}?id_kecamatan="+id_kecamatan);  
        }else{
          alert('field cari harus diisi lebih dari 2 karakter');
        }

        


      }



    </script>

    @endsection