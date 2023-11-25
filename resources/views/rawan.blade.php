
 @extends('layouts.main')

 @section('title', 'Dashboard')

 @section('content')

 <div class="pagetitle">
      <h1>Dashboard Rawan Pelanggaran</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard Rawan Pelanggaran</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Blimbing Card -->
            <div class="col-xxl-4 col-md-4">

              <div class="card info-card sales-card hover-light">

                <a href="{{ url('pelanggaran/list_rawan') }}?id_kecamatan=1">
                   
                  <div class="card-body">
                  <h5 class="card-title">Klojen <span>| Record</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background: #fef9e9">
                      KL
                    </div>
                    <div class="ps-3">
                      <h6>{{ $data[0] }}</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}
                    </div>
                  </div>
                </div>  

                </a>
                
              </div>
            </div><!-- End Reklame Card -->

        
        <!-- Blimbing Card -->
            <div class="col-xxl-4 col-md-4">

              <div class="card info-card sales-card hover-light">

                <a href="{{ url('pelanggaran') }}?id_kegiatan=1">
                   
                  <div class="card-body">
                  <h5 class="card-title">Blimbing <span>| Record</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background: #fef9e9">
                      BL
                    </div>
                    <div class="ps-3">
                      <h6>{{ $data[1] }}</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}
                    </div>
                  </div>
                </div>  

                </a>
                
              </div>
            </div><!-- End Reklame Card -->



{{-- //////////////////////////// --}}


  <!-- Blimbing Card -->
            <div class="col-xxl-4 col-md-4">

              <div class="card info-card sales-card hover-light">

                <a href="{{ url('pelanggaran') }}?id_kegiatan=1">
                   
                  <div class="card-body">
                  <h5 class="card-title">Lowokwaru <span>| Record</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background: #fef9e9">
                     LW
                    </div>
                    <div class="ps-3">
                      <h6>{{ $data[2] }}</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}
                    </div>
                  </div>
                </div>  

                </a>
                
              </div>
            </div><!-- End Reklame Card -->

{{-- //////////////////////////// --}}


  <!-- Blimbing Card -->
            <div class="col-xxl-4 col-md-4">

              <div class="card info-card sales-card hover-light">

                <a href="{{ url('pelanggaran') }}?id_kegiatan=1">
                   
                  <div class="card-body">
                  <h5 class="card-title">Sukun <span>| Record</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background: #fef9e9">
                      SU
                    </div>
                    <div class="ps-3">
                      <h6>{{ $data[3] }}</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}
                    </div>
                  </div>
                </div>  

                </a>
                
              </div>
            </div><!-- End Reklame Card -->


{{-- //////////////////////////// --}}


  <!-- Blimbing Card -->
            <div class="col-xxl-4 col-md-4">

              <div class="card info-card sales-card hover-light">

                <a href="{{ url('pelanggaran') }}?id_kegiatan=1">
                   
                  <div class="card-body">
                  <h5 class="card-title">Kedungkandang <span>| Record</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background: #fef9e9">
                      KD
                    </div>
                    <div class="ps-3">
                      <h6>{{ $data[4] }}</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}
                    </div>
                  </div>
                </div>  

                </a>
                
              </div>
            </div><!-- End Reklame Card -->
           


          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
       
      </div>
    </section>
   

@endsection