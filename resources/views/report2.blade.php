
  
  @extends('layouts.main')

  @section('title','data pelanggaran')

  @section('content')
    
      

      <div class="row">
          <div class="col-lg-6" style="background-color: white;">
          <div class="card">
            <div class="card-body" style="height:80vh">
              <h3 class="card-title">Heatmap Pelanggaran:
                <br>
                <br>
                <select  id="kegiatan_1" >
                  <option value="0"> - Pilih Jenis Pelanggaran - </option>  
                  <option value="0">Semua Pelanggaran</option>
                  <option value="1">Reklame</option>
                  <option value="2">PKL</option>
                  <option value="3">Anjal-Gepeng</option>
                  <option value="4">Asusila</option>
                  <option value="5">Minol</option>
                  <option value="6">Pemondokan</option>
                  <option value="7">Parkir Liar</option>
                  <option value="8">Prokes</option>
                  <option value="9">PAM</option>
                </select>
                <select  id="kecamatan_1" >
                  <option value="0"> - Pilih Kecamatan - </option>  
                  <option value="0">Semua Kecamatan</option>
                  <option value="1">Klojen</option>
                  <option value="2">Blimbing</option>
                  <option value="3">Lowokwaru</option>
                  <option value="4">Sukun</option>
                  <option value="5">Kedungkandang</option>
                </select>
                <a class="btn btn-primary btn-sm" onclick="filterPeta()">Go</a>
              </h3>
              @include('graph.heatmap')

            </div>
            
          </div>
          <img src="{{URL::to('/')}}/assets/img/legend.png" alt="" style="max-width:100%">
          
        </div>

        <div class="col-lg-6" style="background-color:white;">
          <div class="card">
            <div class="card-body" style="height:80vh">
              <h3 class="card-title">Heatmap Titik Rawan Dan Laporan Masyarakat :
                <br>
                <br>
                <select  id="kecamatan_2" style="display: none;">
                  <option value="0"> - Pilih Kecamatan - </option>  
                  <option value="0">Semua Kecamatan</option>
                  <option value="1">Klojen</option>
                  <option value="2">Blimbing</option>
                  <option value="3">Lowokwaru</option>
                  <option value="4">Sukun</option>
                  <option value="5">Kedungkandang</option>
                </select>
                <a class="btn btn-primary btn-sm" onclick="filterPetaRawan()" style="display:none">Go</a>
              </h3>
              @include('graph.heatmap_rawan')

            </div>
            </div>
            <img src="{{URL::to('/')}}/assets/img/critical.png" alt="" style="max-width:100%">
          
        </div>
      
      </div>





    @endsection