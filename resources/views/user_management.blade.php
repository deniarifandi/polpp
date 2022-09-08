
  
  @extends('layouts.main')

  @section('title','data pelanggaran')

  @section('content')

    @include('style.table_style')

    <div class="pagetitle">
      <h1>User Management</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard Pelanggaran</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Berhasil Tambah/Ubah Data User
      
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if ($message = Session::get('successhapus'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Berhasil hapus data User
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

     @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
          hapus data error : {{ $message }}
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
                                        <h2 class="text-center">Data <b>Pengguna</b></h2> 
                                    </div>
                                    <div class="col-sm-2">
                                        
                                        <a class="btn btn-primary pull-right col-lg-12" href="{{ url('registerUser')}}">
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
                                <th scope="col">ID <i class="fa fa-sort"></i></th>
                                <th scope="col">Nama</th>
                                {{-- <th scope="col">Pemilik / Vendor</th> --}}
                                {{-- <th scope="col">Role</th> --}}
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @php
                              $indexUser = 0;
                              @endphp
                              @foreach($users as $user)
                                
                                <form id="deleteForm[{{ $user->id }}]" style="max-width: 19px; margin: 0px" method="POST" action="{{ route('delete_user') }}">
                                {{ csrf_field() }}
                                {{ method_field('POST') }}
                                <input type="text" name="id_user" value="{{$user->id}}">
                                </form>

                                <tr>
                                  <td>{{ $user->id }}</td>
                                  <td>{{ $user->name }}</td>
                            

                                  <td>
                                    <a href="edit_user?user_id={{ $user->id }}" type="submit" class="edit" title="Edit"><i class="material-icons">&#xE254;</i></a>
                                    <a href="#" class="delete" title="Delete" data-toggle="tooltip"onclick="myFunction({{ $user->id }})" 
                                      @if($indexUser == 0)
                                        disabled="disabled" style="color:black; pointer-events: none;"  
                                      @endif
                                      ><i class="material-icons">&#xE872;</i></a>
                                  </td>

                                </tr>
                                @php
                                  $indexUser++;
                                @endphp
                              @endforeach
                      
                            </tbody>

                          </table>
                        {{--    <div class="clearfix">
                              <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                              <ul class="pagination">
                                    <li id="prevLi" class="page-item"><a id="prevButton" class="page-link" >Previous</a></li>
                                      @for($i = 1; $i <= $pelanggarans->lastPage(); $i++)
                                    <li id="pageLi[{{$i}}]" class="page-item"><a id="pageButton[{{$i}}]" class="page-link" href="{{ $pelanggarans->url($i)}}@if($id_kegiatan != 0)&id_kegiatan={{ $id_kegiatan }} @endif" >{{$i}}</a></li>
                                      @endfor

                                    <li id="nextLi" class="page-item"><a id="nextButton" class="page-link" >Next</a></li>
                                
                              </ul>
                          </div> --}}
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
      
     function myFunction(idPelanggaran) {
        let text = "Yakin menghapus data ini?";
        if (confirm(text) == true) {
          document.getElementById("deleteForm["+idPelanggaran+"]").submit();
         
        } else {
          
        }
        
      }

    </script>

    <script type="text/javascript">
      

   

    </script>

    @endsection