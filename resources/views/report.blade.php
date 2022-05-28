
  
  @extends('layouts.main')

  @section('title','data pelanggaran')

  @section('content')
    
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-3d.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        @include('graph.chart_theme')

    <div class="pagetitle">
      <h1>Dashboard Pelanggaran</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Grafik Report Pelanggaran (data set prototype)</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <div class="row">

         <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Grafik Total Hasil Kegiatan</h5>

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
                Jenis Reklame
              </h5>

              @include('graph.jenis_reklame')

            </div>
            
          </div>
        </div>
        

        <div class="col-lg-6">
          <div class="card">
            
            <div class="card-body">
              <h5 class="card-title">
                Lokasi Pelanggaran Reklame
              </h5>

            

            </div>
            
          </div>
        </div>
        
      </div>


       <div class="row">

        <div class="col-lg-6">
          <div class="card">
            
            <div class="card-body">
              <h5 class="card-title">
                Jenis Pelanggaran Reklame
              </h5>

              

            </div>
            
          </div>
        </div>
        

        <div class="col-lg-6">
          <div class="card">
            
            <div class="card-body">
              <h5 class="card-title">
               Tindak Lanjut Reklame
              </h5>

            

            </div>
            
          </div>
        </div>
        
      </div>


   
    </section>

    {{-- @include('graph.chart_theme') --}}

    @endsection