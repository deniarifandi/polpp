

@extends('layouts.main')

@section('title','tambah pelanggaran')

@section('content')
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="pagetitle">
      <h1>Detail Page</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Detail Page</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Detail Pelanggaran</h5>
                <table class="table">
                
                <tbody>
                  <tr>
                    <th>Jenis Laporan</th>
                    <td>
                      @if($pelanggaran->id_jenis_laporan == 1)
                        Laporan Hasil Kegiatan (LHK)
                      @elseif($pelanggaran->id_jenis_laporan == 2)
                        Laporan Kegiatan Harian (LKH)
                      @else
                        Cek Hasil Laporan
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Regu</th>
                    <td>{{ $pelanggaran->regu }}</td>
                  </tr>
                  <tr>
                    <th>Tanggal</th>
                    <td>{{ $pelanggaran->tgl_peristiwa }}</td>
                  </tr>
                  <tr>
                    <th>Kegiatan</th>
                    <td>{{ $pelanggaran->kegiatan }}</td>
                  </tr>
                  <tr>
                    <th>Tema Reklame : </th>
                    <td>{{ $pelanggaran->tema_reklame }}</td>                   
                  </tr>
                  <tr>
                    <th>Pemilik / Vendor :</th>
                    <td>{{ $pelanggaran->pemilik }}</td>
                  </tr>
                   <tr>
                    <th>Jenis Reklame: </th>
                    <td>{{ $pelanggaran->jenis_reklame }}</td>
                  </tr>
                  <tr>
                    <th>Jumlah Reklame: </th>
                    <td>{{ $pelanggaran->jumlah_reklame }}</td>
                  </tr>
                  <tr>
                    <th>Jenis Pelanggaran : </th>
                    <td>{{ $pelanggaran->jenis_pelanggaran }}</td>
                  </tr>
                  <tr>
                    <th>Tindak Lanjut : </th>
                    <td>{{ $pelanggaran->tindak_lanjut }}</td>                   
                  </tr>
                  <tr>
                    <th>Lokasi : </th>
                    <td>{{ $pelanggaran->alamat }}</td>                   
                  </tr>
                  <tr>
                    <td colspan="2">
                      <a class="btn btn-primary" style="float: right;"{{--  href="{{ url('pelanggaran') }}/create?id_kegiatan={{ $pelanggaran->id_kegiatan }}&id={{ $pelanggaran->id }}" --}} onclick="underConstruction()">Edit</a>   
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Dokumentasi Foto</h5>
                          
                  <table class="table" >
                
                <tbody>
                 
                  <form action="{{ url('pelanggaran/upload_image') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <input class="form-control" type="hidden" readonly="" name="id" value="{{ $pelanggaran->id }}">

                    <div class="row" id="inputFoto">
                        <div class="col-lg-4">

                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">Dokumentasi Foto Sebelum Penertiban</h5>

                              @for($i = 0; $i< 5; $i++)

                                <div class="row mb-3">
                                
                                <div class="col-sm-12">

                                  @if(isset($foto_sebelum[$i]))
                                    <a href="{{  asset('/storage/'.$foto_sebelum[$i]) }}" target="_blank"><img src="{{  asset('/storage/'.$foto_sebelum[$i]) }}" style="max-width: 100%"></a>
                                  @else
                                    <input class="form-control" type="file" name="foto_sebelum_[{{$i}}]" onchange="submitFoto(this)">
                                  @endif
                                  

                                </div>
                              </div>

                              @endfor

                              

                    

                            </div>
                          </div>
                        </div>

                        <div class="col-lg-4">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">Dokumentasi Foto Proses Penertiban</h5>

                              
                              @for($i = 0; $i< 5; $i++)

                                <div class="row mb-3">
                                
                                <div class="col-sm-12">

                                  @if(isset($foto_proses[$i]))
                                    <a href="{{  asset('/storage/'.$foto_proses[$i]) }}" target="_blank"><img src="{{  asset('/storage/'.$foto_proses[$i]) }}" style="max-width: 100%"></a>
                                  @else
                                    <input class="form-control" type="file" name="foto_proses_[{{$i}}]" onchange="submitFoto(this)">
                                  @endif
                                  

                                </div>
                              </div>

                              @endfor
                           
                          </div>
                          </div>
                        </div>

                        <div class="col-lg-4">
                           <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">Dokumentasi Foto Setelah Penertiban</h5>

                                

                              @for($i = 0; $i< 5; $i++)

                                <div class="row mb-3">
                                
                                <div class="col-sm-12">

                                  @if(isset($foto_setelah[$i]))
                                    <a href="{{  asset('/storage/'.$foto_setelah[$i]) }}" target="_blank"><img src="{{  asset('/storage/'.$foto_setelah[$i]) }}" style="max-width: 100%"></a>
                                  @else
                                    <input class="form-control" type="file" name="foto_setelah_[{{$i}}]" onchange="submitFoto(this)">
                                  @endif
                                  

                                </div>
                              </div>

                              @endfor  


                            </div>
                           </div>
                        </div>  
                    </div>
                    <div class="row" id="loadingFoto" style="display: none">
                       <div class="col-lg-12">

                          <div class="card">
                            <div class="card-body">
                              {{-- test --}}
                              <br>
                                <div class="d-flex justify-content-center" style="margin-top: 50px">
                                  <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>

                                  </div>

                                  {{-- <h5 style="margin-left: 20px"> Loading Photo</h5> --}}
                                </div><!-- End Center aligned spinner -->
                                <div class="d-flex justify-content-center">
                                  
                                  <h5 style="margin-top: 20px; margin-bottom: 30px"> Loading Photo</h5>
                                </div><!-- End Center aligned spinner -->
                            </div>
                          </div>
                        </div>

                    </div>

                    {{-- <button type="submit" class="btn btn-success">Simpan & Lanjutkan</button> --}}
                  </form>

                </tbody>
              </table>
      
            </div>
          </div>

        </div>
      </div>
    </section>

    <script type="text/javascript">
        

      function submitFoto($this){
        
        document.getElementById("inputFoto").style.display= "none";
        document.getElementById("loadingFoto").style.display = "block";



        // for (var i = 0; i < 30000; i++) {
        //   console.log("test");
        // }

        $this.form.submit();
        
      };
    

    </script>


@endsection