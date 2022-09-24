
  
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
                                <th class="col-2">Nama Grup</i></th>
                                <th class="col-2"> Status </th>
                                <th class="col-2">Tindakan</th>

                              </tr>
                            </thead>
                            <tbody>
                              
                          
                              @foreach($regus as $regu)
                                <tr>
                                  <td>{{ $regu->nama }}</td>
                                  @if($regu->keterangan == 0)
                                    <td class="text-danger">Non-Aktif</td>
                                  @else
                                    <td class="text-success">Aktif</td>
                                  @endif
                                  <td>
                                    <a href="{{ URL('/administration/aktifkan_grup/') }}/{{ $regu->id }}" class="btn btn-success @if($regu->keterangan == 1) disabled @endif" style="color: white;">Enable</a>

                                    <a href="{{ URL('/administration/nonaktifkan_grup/') }}/{{ $regu->id }}" class="btn btn-danger  @if($regu->keterangan == 0) disabled @endif" style="color: white;">Disable</a>
                                  </td>
                                </tr>
                              @endforeach       
                         
                      
                            </tbody>

                          </table>
                          <br>
                            <form action="{{ route('tambah_grup') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                          <div class="row">
                            <div class="col-lg-4 offset-sm-4">
                              <h5>Tambah Grup Baru</h5>
                              <div class="input-group">
                                <input type="text" class="form-control" name="nama" placeholder="Nama Grup Baru...">
                                <span class="input-group-btn">
                                  <button class="btn btn-success" type="submit" >Tambah!</button>
                                </span>
                              </div><!-- /input-group -->
                            </div><!-- /.col-lg-6 -->
                          </div>
                        </form>
                        </div>
                    </div>
                </div>
    
            </div>
          </div>

        </div><!-- End Left side columns -->

       
       
      </div>
    </section>



    <script type="text/javascript">
   
    </script>

    @endsection