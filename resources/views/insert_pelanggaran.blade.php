
@extends('layouts.main')

@section('title','tambah pelanggaran')

@section('content')


<div class="pagetitle">
  <h1>Tambah Data Pelanggaran</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Pages</li>
      <li class="breadcrumb-item active">Blank</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Tambah Data Error {{ $message }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

<section class="section">
  <div class="row">

    <div class="col-lg-12">
      <div class="card">

        <div class="card-body">

          <form action="{{ route('pelanggaran.store') }}" method="POST" enctype="multipart/form-data">
            @csrf


            <h5 class="card-title" >Detail Laporan</h5>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Jenis Laporan</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" name="id_jenis_laporan" >
                  <option selected value="">- Pilih Jenis Laporan -</option>
                  <option value="1">Laporan Hasil Kegiatan (LHK)</option>
                  <option value="2">Laporan Kegiatan Harian(LKH)</option>
                  <option value="3">Cek Hasil Laporan</option>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Regu</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" name="id_regu" >
                  <option selected value="">- Pilih Regu -</option>
                  @foreach($regus as $regu)
                  <option value="{{$regu->id}}">{{$regu->nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Tanggal</label>
              <div class="col-sm-8">
                <input type="date" name="tgl_peristiwa" class="form-control" >
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Kegiatan</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" name="id_kegiatan" onchange="openForm()">
                  @if(isset($_GET['id_kegiatan']))
                    <option value="{{$kegiatans[$_GET['id_kegiatan']-1]->id}}" selected="selected">{{$kegiatans[$_GET['id_kegiatan']-1]->nama}}</option>
                  @else
                    @foreach($kegiatans as $kegiatan)
                      <option value="{{$kegiatan->id}}">{{$kegiatan->nama}}</option>
                    @endforeach
                  @endif
                </select>
              </div>
            </div>

          </div>
        </div>
      </div>

      {{-- start reklame --}}
      <div class="col-lg-6" id="form-reklame" @if(isset($_GET['id_kegiatan'])) @if($_GET['id_kegiatan'] != 1) style="display: none" @endif @endif>

        <div class="card">
          <div class="card-body">

            <h5 class="card-title" >Detail Pelanggaran</h5>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Nama/Tema Reklame</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="tema_reklame">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Pemilik / Vendor</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" name="id_pemilik" >
                  <option selected value="">- Pilih Pemilik -</option>
                  @foreach($vendors as $vendor)
                  <option value="{{$vendor->id}}">{{$vendor->nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Jenis Reklame</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" name="id_jenis_reklame" >
                  <option selected value="">- Pilih Jenis Reklame -</option>
                  @foreach($jenis_reklames as $jenis_reklame)
                  <option value="{{$jenis_reklame->id}}">{{$jenis_reklame->nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Ukuran Reklame</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" name="id_ukuran_reklame" >
                  <option selected value="">- Pilih Ukuran Reklame -</option>
                  @foreach($ukuran_reklames as $ukuran_reklame)
                  <option value="{{$ukuran_reklame->id}}">{{$ukuran_reklame->nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Jumlah Reklame</label>
              <div class="col-sm-8">
                <input type="number" class="form-control" name="jumlah_reklame">
              </div>
            </div>

          </div>
        </div>
      </div>
      {{-- end reklame --}}

      {{-- start pkl --}}
      <div class="col-lg-6" id="form-reklame" @if(isset($_GET['id_kegiatan'])) @if($_GET['id_kegiatan'] != 2) style="display: none" @endif @endif>

        <div class="card">
          <div class="card-body">

            <h5 class="card-title" >Detail Pelanggaran PKL</h5>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Jenis PKL</label>
              <div class="col-sm-8">
                 <select class="form-select" aria-label="Default select example" name="id_jenis_pkl" >
                  <option selected value="">- Pilih Jenis PKL -</option>
                  @foreach($jenis_pkls as $jenis_pkl)
                  <option value="{{$jenis_pkl->id}}">{{$jenis_pkl->nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>
           
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Nama Pelaku Usaha</label>
              <div class="col-sm-8">
               <input type="text" class="form-control" name="pkl_nama">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">No. Identitas</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="pkl_no_identitas">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Alamat Pelaku Usaha</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="pkl_alamat">
              </div>
            </div>

          </div>
        </div>
      </div>
      {{-- end pkl --}}

      {{-- start anjal --}}
      <div class="col-lg-6" id="form-reklame" @if(isset($_GET['id_kegiatan'])) @if($_GET['id_kegiatan'] != 3) style="display: none" @endif @endif>

        <div class="card">
          <div class="card-body">

            <h5 class="card-title" >Detail Pelanggaran AnJal & GePeng</h5>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Jenis AnJal / GePeng</label>
              <div class="col-sm-8">
                 <select class="form-select" aria-label="Default select example" name="id_jenis_anjal_gepeng" >
                  <option selected value="">- Pilih Jenis AnJal / GePeng -</option>
                  @foreach($jenis_anjal_gepengs as $jenis_anjal_gepeng)
                  <option value="{{$jenis_anjal_gepeng->id}}">{{$jenis_anjal_gepeng->nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>
           
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Nama AnJal / GePeng</label>
              <div class="col-sm-8">
               <input type="text" class="form-control" name="anjal_gepeng_nama">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">No. Identitas</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="anjal_gepeng_no_identitas">
              </div>
            </div>

          </div>
        </div>
      </div>
      {{-- end anjal --}}

      {{-- start PSK --}}
      <div class="col-lg-6" id="form-reklame" @if(isset($_GET['id_kegiatan'])) @if($_GET['id_kegiatan'] != 4) style="display: none" @endif @endif>

        <div class="card">
          <div class="card-body">

            <h5 class="card-title" >Detail Pelanggaran PSK</h5>
           
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Nama PSK</label>
              <div class="col-sm-8">
               <input type="text" class="form-control" name="psk_nama">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">No. Identitas</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="psk_no_identitas">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-8">
                 <select class="form-select" aria-label="Default select example" name="psk_kelamin" >
                  <option selected value="">- Pilih Jenis kelamin -</option>
                  <option value="1">Perempuan</option>
                  <option value="2">Laki-laki</option>
                </select>
              </div>
            </div>

          </div>
        </div>
      </div>
      {{-- end PSK --}}

      {{-- start Minol --}}
      <div class="col-lg-6" id="form-reklame" @if(isset($_GET['id_kegiatan'])) @if($_GET['id_kegiatan'] != 5) style="display: none" @endif @endif>

        <div class="card">
          <div class="card-body">

            <h5 class="card-title" >Detail Pelanggaran Minol</h5>
           
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Nama Pemilik Minol</label>
              <div class="col-sm-8">
               <input type="text" class="form-control" name="minol_nama">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">No. Identitas</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="minol_no_identitas">
              </div>
            </div>

          </div>
        </div>
      </div>
      {{-- end Minol --}}

        {{-- start Pemondokan --}}
      <div class="col-lg-6" id="form-reklame" @if(isset($_GET['id_kegiatan'])) @if($_GET['id_kegiatan'] != 6) style="display: none" @endif @endif>

        <div class="card">
          <div class="card-body">

            <h5 class="card-title" >Detail Pelanggaran Pemondokan</h5>
           
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Nama Pemilik Pemondokan</label>
              <div class="col-sm-8">
               <input type="text" class="form-control" name="pemondokan_nama">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">No. Identitas</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="pemondokan_no_identitas">
              </div>
            </div>

          </div>
        </div>
      </div>
      {{-- end pemondokan --}}

      {{-- start Parkir liar --}}
      <div class="col-lg-6" id="form-reklame" @if(isset($_GET['id_kegiatan'])) @if($_GET['id_kegiatan'] != 7) style="display: none" @endif @endif>

        <div class="card">
          <div class="card-body">

            <h5 class="card-title" >Detail Pelanggaran Parkir Liar</h5>
           
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Nama Pelaku Parkir Liar</label>
              <div class="col-sm-8">
               <input type="text" class="form-control" name="parkir_nama">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">No. Identitas</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="parkir_no_identitas">
              </div>
            </div>

          </div>
        </div>
      </div>
      {{-- end parkir liar --}}

       {{-- start prokes --}}
      <div class="col-lg-6" id="form-reklame" @if(isset($_GET['id_kegiatan'])) @if($_GET['id_kegiatan'] != 8) style="display: none" @endif @endif>

        <div class="card">
          <div class="card-body">

            <h5 class="card-title" >Detail Prokes</h5>
            
             <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Jenis Penertiban Prokes</label>
              <div class="col-sm-8">
                 <select class="form-select" aria-label="Default select example" name="id_jenis_penertiban_prokes" >
                  <option selected value="">- Pilih Jenis Penertiban Prokes -</option>
                  @foreach($jenis_penertiban_prokess as $jenis_penertiban_prokes)
                  <option value="{{$jenis_penertiban_prokes->id}}">{{$jenis_penertiban_prokes->nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Jenis Pelaku Usaha</label>
              <div class="col-sm-8">
                 <select class="form-select" aria-label="Default select example" name="id_jenis_pelaku_usaha" >
                  <option selected value="">- Pilih Jenis Pelaku Usaha -</option>
                  <option value="1">Perseorangan</option>
                  <option value="2">Pelaku Usaha</option>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Nama Usaha</label>
              <div class="col-sm-8">
               <input type="text" class="form-control" name="prokes_nama">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">No. Identitas</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="prokes_no_identitas">
              </div>
            </div>

          </div>
        </div>
      </div>
      {{-- end prokes --}}



      {{-- middle row right --}}
      <div class="col-lg-6" id="form-tindakan">

        <div class="card">
          <div class="card-body">

            <h5 class="card-title" >Lokasi & tindak lanjut</h5>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Jenis Pelanggaran</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" id="select_jenis_pelanggaran" name="id_jenis_pelanggaran" >
                  <option selected value="">- Pilih Jenis Pelanggaran -</option>

                  @foreach($jenis_pelanggarans as $jenis_pelanggaran)
                  <option value="{{$jenis_pelanggaran->id}}" class="pelanggaran_kategori_{{ $jenis_pelanggaran->kategori }}" style="display: none;">{{$jenis_pelanggaran->nama}}</option>
                  @endforeach

                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Tindak Lanjut</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" name="id_tindak_lanjut" >
                  <option selected value="">- Pilih Jenis Tindakan -</option>

                  @foreach($tindak_lanjuts as $tindak_lanjut)
                  <option value="{{$tindak_lanjut->id}}">{{$tindak_lanjut->nama}}</option>
                  @endforeach

                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Kecamatan</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" id="select_kecamatan" name="id_kecamatan" onchange="showKelurahan()" >
                  <option selected value="">- Pilih Kecamatan -</option>


                  @foreach($kecamatans as $kecamatan)
                  <option value="{{$kecamatan->id}}">{{$kecamatan->nama}}</option>
                  @endforeach

                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Kelurahan</label>
              <div class="col-sm-8">
                <select class="form-select" aria-label="Default select example" id="select_kelurahan" name="id_kelurahan" disabled="disabled">
                  <option selected value="">- Pilih Kelurahan -</option>


                  @foreach($kelurahans as $kelurahan)
                  <option value="{{$kelurahan->id}}" class="kecamatan_{{$kelurahan->id_kec}} kelurahan_all" style="display: none">{{$kelurahan->nama}}</option>
                  @endforeach

                </select>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Alamat</label>
              <div class="col-sm-8">
                <input class="form-control" type="text" name="alamat">
              </div>
            </div>

             <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">GeoLocation</label>
              <div class="col-sm-8">

                <div class="row">
                  <div class="col-sm-6">
                  <input class="form-control" type="text" id="lat" name="lat" placeholder="lat">   
                  </div>
                  
                  <div class="col-sm-6">
                    <input class="form-control" type="text" id="lon" name="lon" placeholder="lon">   
                  </div>  
                  <br>
                </div>
                
                <br>
                  <div id="map"></div>
              </div>
            </div>

             <div class="row mb-3">
              <label for="inputText" class="col-sm-4 col-form-label">Foto Lokasi</label>
              <div class="col-sm-8">
                <input class="form-control" type="file" name="foto_lokasi">
              </div>
            </div>

            <button type="submit" class="btn btn-success">Simpan & Lanjutkan</button>

          </div>
        </div>
      </div>

    </form><!-- End General Form Elements -->
    </div>
  </div>
</section>



<style>

#map {height: 250px; width: 100%; }
</style>

<script>
    
   function showPosition(position) {
      console.log("show possition start");
    
    }

    function getLocation() {
      if (navigator.geolocation) {

        //navigator.geolocation.getCurrentPosition(showPosition);
        navigator.geolocation.getCurrentPosition(success, error);

        console.log("Geolocation supported.");
      } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
        console.log("Geolocation is not supported by this browser.");
      }
    }

      function success(position) {
        console.log(position);
        document.getElementById("lat").value = position.coords.latitude;
        document.getElementById("lon").value = position.coords.longitude; 
          const marker1 = new mapboxgl.Marker()
          .setLngLat([position.coords.longitude, position.coords.latitude])
          .addTo(map);

          console.log('watermark');
          console.log(position.coords.longitude, position.coords.latitude);

          map.flyTo({center:[position.coords.longitude, position.coords.latitude]});

      }

      function error(error) {

        console.log('Geolocation error!');
        console.log(error);

      }

    </script>

<script type="text/javascript">
    
    function showReklame(){

      document.getElementById('form-reklame').style.display = "block";
      document.getElementById('form-tindakan').style.display = "block";

    }

    function showKelurahan(){
        document.getElementById('select_kelurahan').value = "";
        var id_kec = document.getElementById("select_kecamatan").value;

        const kelurahan_all = document.getElementsByClassName("kelurahan_all");
        for (let i = 0; i < kelurahan_all.length; i++) {
          kelurahan_all[i].style.display = "none";
        }

        const kelurahan_selected = document.getElementsByClassName("kecamatan_"+id_kec);
        for (let i = 0; i < kelurahan_selected.length; i++) {
          kelurahan_selected[i].style.display = "block";
        }

        if (id_kec == "") {
          document.getElementById('select_kelurahan').disabled = "disabled";
        }else{
          document.getElementById('select_kelurahan').disabled = "";
        }

      }

      (function() {
        console.log('auto run');
        var id_kegiatan = @php echo $_GET['id_kegiatan']; @endphp;
        
        const kegiatan_selected = document.getElementsByClassName("pelanggaran_kategori_"+id_kegiatan);

        for (let i = 0; i < kegiatan_selected.length; i++) {
          kegiatan_selected[i].style.display = "block";
        }

        getLocation();



      })();
  
</script>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiYXJpZmFuZGlkZW5pIiwiYSI6ImNsMzZvNXZxejEzbHAzY3FzcmpuNzNrbm0ifQ.-XX0gvG2ooyVnJvZZHg9Hg';
          const map = new mapboxgl.Map({
          container: 'map', // container ID
          style: 'mapbox://styles/mapbox/streets-v11', // style URL
          center: [106.82332708986368,-6.160440512853471 ], // starting position [lng, lat]
          zoom: 15 // starting zoom
        });

        
    </script>


@endsection