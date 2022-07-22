

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
              <h5 class="card-title">Detail Laporan Pelanggaran</h5>
                <table class="table">
                
                <tbody>
                  <tr>
                    <th>Id Laporan</th>
                    <td>
                     {{$pelanggaran[0]->id}}
                    </td>
                  </tr>
                  <tr>
                    <th>Nama Pelapor</th>
                    <td>
                     {{$pelanggaran[0]->nama}}
                    </td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td>
                     {{$pelanggaran[0]->email}}
                    </td>
                  </tr>
                  <tr>
                    <th>NIK</th>
                    <td>
                     {{$pelanggaran[0]->id}}
                    </td>
                  </tr>
                  <tr>
                    <th>Judul</th>
                    <td>
                     {{$pelanggaran[0]->subjek}}
                    </td>
                  </tr>
                   <tr>
                    <th>Pesan</th>
                    <td>
                     {{$pelanggaran[0]->pesan}}
                    </td>
                  </tr>
                  <tr>
                    <th>Status</th>
                    <td>
                     {{$pelanggaran[0]->status}}
                    </td>
                  </tr>
                   <tr>
                    <th>Peta Lokasi :</th>
                  </tr>
                  <tr>
                    @if(isset($pelanggaran[0]->longitude))
                    <td colspan="2"> <div id="map"></div></td>
                    @else
                    <td style="color: red">Map Tidak Ditemukan</td>
                    @endif
                  </tr>
                  <tr>
                    <th>Tindakan</th>
                    <td style="float: right;"><a class="btn btn-primary" href="{{ url('laporan/detail_print') }}/{{ $pelanggaran[0]->id }}" target="_blank" >Print Laporan</a> <button class="btn btn-success" onclick="alert('under construction')">Sudah Diproses</button></td>
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
                 
                  
                    <a href="" target="_blank"><img src="{{  asset('/storage/'.$foto_laporan[0]) }}" style="max-width: 100%"></a>
                  

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
          .setLngLat([{{ $pelanggaran[0]->longitude }}, {{ $pelanggaran[0]->latitude }}])
          .addTo(map);
       
         map.flyTo({center:[{{ $pelanggaran[0]->longitude }}, {{ $pelanggaran[0]->latitude }}]});

      })();
  
        
    </script>

    

    </script>


@endsection