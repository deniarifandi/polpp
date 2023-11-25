
  
  @extends('layouts.main')

  @section('title','data pelanggaran')

  @section('content')
    
      

      <div class="row">

        

          <div class="col-lg-12">
          <div class="card">
            <div class="card-body" style="height:80vh">
              <h3 class="card-title">Heatmap Malang :
              
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
        </div>

      
      </div>





    @endsection