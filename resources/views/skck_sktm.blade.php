
 @extends('layouts.main_can')

 @section('title', 'Dashboard')

 @section('content')

 <div class="pagetitle">
      <h1>Dashboard Permohonan Pengantar SKCK & SKTM</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

 
            <!-- PKL Card -->
            <div class="col-xxl-6 col-md-6">
              <div class="card info-card revenue-card">

              <a href="{{ url('tambah_skck') }}">
                <div class="card-body">
                  <h5 class="card-title">SKCK <span>| Surat Keterangan Catatan Kepolisian</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                       <img src="assets/img/skck.png" style="max-width: 80px;">
                    </div>
                    <div class="ps-3">
                      <h6>Permohonan SKCK</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                    </div>
                  </div>
                </div>
              </a>

              </div>
            </div><!-- End Reklame Card -->

            <!-- GEPENG Card -->

                <div class="col-xxl-6 col-md-6">
              <div class="card info-card revenue-card">

              <a href="{{ url('tambah_sktm') }}">
                <div class="card-body">
                  <h5 class="card-title">SKTM <span>| Surat Keterangan Tidak Mampu</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background-color: #627cff;">
                       <img src="assets/img/sktm.png" style="max-width: 80px;">
                    </div>
                    <div class="ps-3">
                      <h6>Permohonan SKTM </h6>
                      {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

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