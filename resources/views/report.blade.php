
  
  @extends('layouts.main')

  @section('title','data pelanggaran')

  @section('content')
    
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-3d.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        {{-- @include('graph.chart_theme') --}}

    <div class="pagetitle">
      <h1>Dashboard Pelanggaran</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Grafik Report Pelanggaran test</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <div class="row">

              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body">
                    <br>
                    
                        <select name="tahun" id="tahun" class="btn btn-primary" onchange="gantiTahun()" style="width:100%">
                         @for($i = 2021; $i <= date('Y'); $i++)
                              <option value="{{ $i }}">{{ $i }}</option>
                          @endfor
                        </select>      
                      
                  </div>
                </div>
              </div>        

         <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <h5 class="card-title">Grafik Perbandingan Tipe Pelanggaran Tahun :  </h5>     
                </div>  
                <div class="col-lg-6">
                 
                </div>
              </div>

              @include('graph.grafik_total_kegiatan')

            </div>
          </div>
        </div>        
        
      </div>


      


      <div class="row">

         <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Jenis Penertiban</h5>

              @include('graph.jenis_penertiban')

            </div>
          </div>
        </div>

         <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Lokasi Pelanggaran</h5>

              @include('graph.lokasi_pelanggaran')
          

            </div>
          </div>
        </div>

      </div>

      <h2>REKLAME</h2>

      <div class="row">

        <div class="col-lg-6">
          <div class="card">
            
            <div class="card-body">
              <h5 class="card-title">
                Pelanggaran Tiap Jenis Reklame 
              </h5>

              @include('graph.jenis_reklame')

            </div>
            
          </div>
        </div>
        

        <div class="col-lg-6">
          <div class="card">
            
            <div class="card-body">
              <h5 class="card-title">
                Lokasi Pelanggaran Pemasangan Reklame
              </h5>

              @include('graph.lokasi_pelanggaran_reklame')
            

            </div>
            
          </div>
        </div>
        
      </div>


       <div class="row">

        <div class="col-lg-6">
          <div class="card">
            
            <div class="card-body">
              <h5 class="card-title">
                Jenis Pelanggaran Tiap Reklame
              </h5>

            @include('graph.jenis_pelanggaran_reklame')

            </div>
            
          </div>
        </div>
        

        <div class="col-lg-6">
          <div class="card">
            
            <div class="card-body">
              <h5 class="card-title">
               Tindak Lanjut Reklame
              </h5>

            @include('graph.jenis_tindak_lanjut_reklame')

            </div>
            
          </div>
        </div>
        
      </div>


      <h2>PKL</h2>

       <div class="row">

        <div class="col-lg-6">
          <div class="card">
            
            <div class="card-body">
              <h5 class="card-title">
                Jenis Pelanggaran PKL
              </h5>

              @include('graph.jenis_pelanggaran_pkl')

            </div>
            
          </div>
        </div>
        

        <div class="col-lg-6">
          <div class="card">
            
            <div class="card-body">
              <h5 class="card-title">
               Wilayah Pelanggaran PKL
              </h5>

              @include('graph.lokasi_pelanggaran_pkl')

            </div>
            
          </div>
        </div>

         
        
      </div>


      <div class="row">

        <div class="col-lg-6">
          <div class="card">
            
            <div class="card-body">
              <h5 class="card-title">
                Tipe Pelanggaran PKL
              </h5>

              @include('graph.grafik_operasi_penertiban_pkl')

            </div>
            
          </div>
        </div>

          <div class="col-lg-6">
          <div class="card">
            
            <div class="card-body">
              <h5 class="card-title">
               Tindak Lanjut PKL
              </h5>
              @include('graph.jenis_tindak_lanjut_pkl')
            </div>
            
          </div>
        </div>
        
        
      </div>


      <h2>ANJAL GEPENG</h2>

      <div class="row">



          <div class="col-lg-6">
          <div class="card">
            
            <div class="card-body">
              <h5 class="card-title">
               Jenis Anjal-Gepeng
              </h5>
              @include('graph.jenis_pelanggaran_anjal')
            </div>
            
          </div>
        </div>

                <div class="col-lg-6">
          <div class="card">
            
            <div class="card-body">
              <h5 class="card-title">
                Lokasi Pelanggaran Anjal-Gepeng
              </h5>
              @include('graph.lokasi_pelanggaran_anjal')
            </div>
            
          </div>
        </div>
        
      </div>

         <div class="row">

          <div class="col-lg-6">
          <div class="card">
            
            <div class="card-body">
              <h5 class="card-title">
                Tindak Lanjut Anjal Gepeng
              </h5>
                @include('graph.jenis_tindak_lanjut_anjal')
            </div>
            
          </div>
        </div>
        
      </div>
   

        <h2>PSK</h2>

          <div class="row">

            <div class="col-lg-6">
              <div class="card">
                
                <div class="card-body">
                  <h5 class="card-title">
                    Lokasi Pelanggaran PSK
                  </h5>
                  @include('graph.lokasi_pelanggaran_psk')
                </div>
                
              </div>
            </div>

             <div class="col-lg-6">
              <div class="card">
                
                <div class="card-body">
                  <h5 class="card-title">
                    Tindak Lanjut PSK
                  </h5>
                    @include('graph.jenis_tindak_lanjut_psk')
                </div>
                
              </div>
            </div>

          
          </div>


           <h2>Minol</h2>

          <div class="row">

            <div class="col-lg-6">
              <div class="card">
                
                <div class="card-body">
                  <h5 class="card-title">
                    Lokasi Pelanggaran Minol
                  </h5>
                  @include('graph.lokasi_pelanggaran_minol')
                </div>
                
              </div>
            </div>

             <div class="col-lg-6">
              <div class="card">
                
                <div class="card-body">
                  <h5 class="card-title">
                    Tindak Lanjut Minol
                  </h5>
                    @include('graph.jenis_tindak_lanjut_minol')
                </div>
                
              </div>
            </div>
          
          </div>

            <h2>Pemondokan</h2>

          <div class="row">

            <div class="col-lg-6">
              <div class="card">
                
                <div class="card-body">
                  <h5 class="card-title">
                    Lokasi Pelanggaran Pemondokan
                  </h5>
                  @include('graph.lokasi_pelanggaran_pemondokan')
                </div>
                
              </div>
            </div>

             <div class="col-lg-6">
              <div class="card">
                
                <div class="card-body">
                  <h5 class="card-title">
                    Tindak Lanjut Pemondokan
                  </h5>
                    @include('graph.jenis_tindak_lanjut_pemondokan')
                </div>
                
              </div>
            </div>

          
          </div>


                <h2>Parkir</h2>

          <div class="row">

            <div class="col-lg-6">
              <div class="card">
                
                <div class="card-body">
                  <h5 class="card-title">
                    Lokasi Pelanggaran Parkir Liar
                  </h5>
                  @include('graph.lokasi_pelanggaran_parkir')
                </div>
                
              </div>
            </div>

             <div class="col-lg-6">
              <div class="card">
                
                <div class="card-body">
                  <h5 class="card-title">
                    Tindak Lanjut Parkir Liar
                  </h5>
                    @include('graph.jenis_tindak_lanjut_parkir')
                </div>
                
              </div>
            </div>

          
          </div>


          <h2>Prokes</h2>

          <div class="row">

            <div class="col-lg-6">
              <div class="card">
                
                <div class="card-body">
                  <h5 class="card-title">
                    Lokasi Pelanggaran Prokes
                  </h5>
                  @include('graph.lokasi_pelanggaran_prokes')
                </div>
                
              </div>
            </div>

             <div class="col-lg-6">
              <div class="card">
                
                <div class="card-body">
                  <h5 class="card-title">
                    Tindak Lanjut Prokes
                  </h5>
                    @include('graph.jenis_tindak_lanjut_prokes')
                </div>
                
              </div>
            </div>

          
          </div>

    </section>

    <script type="text/javascript">
      
    $(document).ready(function () {

         // console.log("test");

      });


    </script>

    <script type="text/javascript">
      
      function gantiTahun(){

        // console.log( document.getElementById("tahun").value);
        var tahun = document.getElementById("tahun").value;
        window.location.replace("{{ URL::to('/report') }}?tahun="+tahun);
      }

    </script>




    @endsection