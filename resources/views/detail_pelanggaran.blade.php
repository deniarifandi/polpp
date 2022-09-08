

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

       @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Berhasil tambah Data Pelanggaran
      
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Detail Pelanggaran</h5>
                <table class="table">
                
                <tbody>
                  <tr>
                    <th>ID Laporan</th>
                    <th>{{ $pelanggaran->id }}</th>
                  </tr>
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

                  @if($pelanggaran->id_kegiatan == 1)
                  {{-- REKLAME --}}
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
                  {{-- END REKLAME --}}
                  @elseif($pelanggaran->id_kegiatan == 2)
                  {{-- PKL --}}
                  <tr>
                    <th>Jenis PKL</th>
                    <td>{{ $pelanggaran->pkl }}</td>
                  </tr>

                  <tr>
                    <th>Nama Pelaku Usaha</th>
                    <td>{{ $pelanggaran->pkl_nama }}</td>
                  </tr>

                  <tr>
                    <th>No Identitas</th>
                    <td>{{ $pelanggaran->pkl_no_identitas }}</td>
                  </tr>

                  <tr>
                    <th>Alamat Pelaku Usaha</th>
                    <td>{{ $pelanggaran->pkl_alamat }}</td>
                  </tr>
                  {{-- END PKL --}}
                  @elseif($pelanggaran->id_kegiatan == 3)
                  {{-- ANJAL --}}
                  <tr>
                    <th>Jenis AnJal-GePeng</th>
                    <td>{{ $pelanggaran->anjalgepeng }}</td>
                  </tr>

                  <tr>
                    <th>Nama AnJal-GePeng</th>
                    <td>{{ $pelanggaran->anjal_gepeng_nama }}</td>
                  </tr>

                  <tr>
                    <th>No Identitas</th>
                    <td>{{ $pelanggaran->anjal_gepeng_no_identitas }}</td>
                  </tr>
                  {{-- END ANJAL --}}
                  @elseif($pelanggaran->id_kegiatan == 4)  
                  {{-- START PSK --}}

                      <tr>
                        <th>Nama PSK</th>
                        <td>{{ $pelanggaran->psk_nama }}</td>
                      </tr>

                      <tr>
                        <th>No Identitas</th>
                        <td>{{ $pelanggaran->psk_no_identitas }}</td>
                      </tr>
                  {{-- END PSK --}}
                  @elseif($pelanggaran->id_kegiatan == 5)  
                  {{-- START MINOL --}}

                      <tr>
                        <th>Nama Pelanggar MINOL</th>
                        <td>{{ $pelanggaran->minol_nama }}</td>
                      </tr>

                      <tr>
                        <th>No Identitas</th>
                        <td>{{ $pelanggaran->minol_no_identitas }}</td>
                      </tr>
                  {{-- END Minol --}}
                  @elseif($pelanggaran->id_kegiatan == 6)  
                  {{-- START Pemondokan --}}

                      <tr>
                        <th>Nama Pemondokan</th>
                        <td>{{ $pelanggaran->pemondokan_nama }}</td>
                      </tr>

                      <tr>
                        <th>No Identitas</th>
                        <td>{{ $pelanggaran->pemondokan_no_identitas }}</td>
                      </tr>
                  {{-- END PSK --}}
                  @elseif($pelanggaran->id_kegiatan == 7)  
                  {{-- START Parkirliar --}}

                      <tr>
                        <th>Nama Parkir Liar</th>
                        <td>{{ $pelanggaran->parkir_nama }}</td>
                      </tr>

                      <tr>
                        <th>No Identitas</th>
                        <td>{{ $pelanggaran->parkir_no_identitas }}</td>
                      </tr>
                  {{-- END Parkirliar --}}
                  @elseif($pelanggaran->id_kegiatan == 8)
                    <tr>
                      <th>Jenis Penertiban Prokes</th>
                      <td>{{ $pelanggaran->prokes }}</td>
                    </tr>
                    <tr>
                      <th>Jenis Pelaku Usaha</th>
                      @if($pelanggaran->id_jenis_pelaku_usaha)
                        <td>Perseorangan</td>
                      @elseif($pelanggaran->id_jenis_pelaku_usaha){
                        <td>Perseorangan</td>
                      }
                      @else
                        <td>Null</td>
                      @endif
                    </tr>
                    <tr>
                      <th>Nama</th>
                      <td>{{ $pelanggaran->prokes_nama }}</td>
                    </tr>
                    <tr>
                      <th>No. Identitas</th>
                      <td>{{ $pelanggaran->prokes_no_identitas }}</td>
                    </tr>
                  @endif

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
                    <th>Foto Lokasi :</th>
                    @if(isset($foto_lokasi[0]))
                    <td><a href="{{  asset('/storage/'.$foto_lokasi[0]) }}" target="_blank"><img src="{{  asset('/storage/'.$foto_lokasi[0]) }}" style="width: 100%; max-width: 300px"></a></td>
                    @else
                    <td style="color: red">Foto Tidak Ditemukan</td>
                    @endif
                  </tr>
                  <tr>
                    <th>Koordinat : </th>
                    <td>{{ $pelanggaran->lat }} , {{ $pelanggaran->lon }}</td>                   
                  </tr>
                  <tr>
                    <th>Peta Lokasi :</th>
                    @if(isset($pelanggaran->lat))
                    <td> <div id="map"></div></td>
                    @else
                    <td style="color: red">Map Tidak Ditemukan</td>
                    @endif
                  </tr>

                  <tr>
                    <td colspan="2">
                      <a class="btn btn-success" style="float: right;" href="{{ url('pelanggaran/pelanggaran_print') }}/{{ $pelanggaran->id }}" target="_blank" > Print Laporan</a> 

                      <a class="btn btn-primary" style="float: right; margin-right: 5px" href="{{ url('pelanggaran')}}/edit/{{ $pelanggaran->id }}" >Edit</a>   
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

    <style>

#map {height: 250px; width: 100%; }
</style>

    <script type="text/javascript">
        

      function submitFoto($this){
        
        document.getElementById("inputFoto").style.display= "none";
        document.getElementById("loadingFoto").style.display = "block";

        $this.form.submit();
        
      };

      mapboxgl.accessToken = 'pk.eyJ1IjoiYXJpZmFuZGlkZW5pIiwiYSI6ImNsMzZvNXZxejEzbHAzY3FzcmpuNzNrbm0ifQ.-XX0gvG2ooyVnJvZZHg9Hg';
          const map = new mapboxgl.Map({
          container: 'map', // container ID
          style: 'mapbox://styles/mapbox/streets-v11', // style URL
          center: [106.82332708986368,-6.160440512853471 ], // starting position [lng, lat]
          zoom: 15 // starting zoom
        });

      (function() {
        console.log("test");
         const marker1 = new mapboxgl.Marker()
          .setLngLat([{{ $pelanggaran->lon }}, {{ $pelanggaran->lat }}])
          .addTo(map);
       
         map.flyTo({center:[{{ $pelanggaran->lon }}, {{ $pelanggaran->lat }}]});

      })();
  
        
    </script>

    

    </script>


@endsection