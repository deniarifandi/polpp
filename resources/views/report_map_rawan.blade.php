
  
  @extends('layouts.main')

  @section('title','data pelanggaran')

  @section('content')
    
      

      <div class="row">

        

          <div class="col-lg-6">
            <div class="card">
              <div class="card-body" style="height:80vh">
                <h3 class="card-title">Heatmap Malang :
                
                  
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


                @include('graph.heatmap_rawan')

              </div>
            </div>
          </div>
             <div class="col-lg-6">
            <div class="card">
              <div class="card-body" style="height:80vh">
                

                

              </div>
            </div>
          </div>

      
      </div>





    @endsection