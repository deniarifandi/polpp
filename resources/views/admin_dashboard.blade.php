
 @extends('layouts.main')

 @section('title', 'Dashboard')

 @section('content')

 <div class="pagetitle">
      <h1>Dashboard Administrasi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard Administrasi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
              
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Kelola Administrasi Website</h5>

                     <form action="{{ route('update_config') }}" method="POST" enctype="multipart/form-data">
                      @csrf

                      <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Part</th>
                                <th scope="col">Value</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th>Judul Website</th>
                                <th><input class="form-control" type="text" name="judul" value="{{ $admin[0]->value }}"></th>
                              </tr>
                              {{-- <tr>
                                <th>Sub Judul Website</th>
                                <th><input class="form-control"  type="text" name="judul_web"></th>
                              </tr> --}}
                             
                              <tr>
                                <th>Alamat</th>
                                <th><input class="form-control"  type="text" name="alamat" value="{{ $admin[1]->value }}"></th>
                              </tr>
                              <tr>
                                <th>E-mail</th>
                                <th><input class="form-control"  type="text" name="email" value="{{ $admin[2]->value }}"></th>
                              </tr>
                              <tr>
                                <th>Telepon</th>
                                <th><input class="form-control"  type="text" name="telepon" value="{{ $admin[3]->value }}"></th>
                              </tr>
                              <tr>
                                <th>Kelola Grup</th>
                                <th><a href="" class="btn btn-sm btn-primary">Kelola</a></th>
                              </tr>
                            
                            </tbody>
                          </table>

                           <button type="submit" class="btn btn-success">Simpan & Lanjutkan</button>  
                      </form><!-- End Gene

                  </div>
              </div>

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
       
      </div>
    </section>
   

@endsection