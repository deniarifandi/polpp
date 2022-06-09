
 @extends('layouts.main')

 @section('title', 'Dashboard')

 @section('content')

 <div class="pagetitle">
      <h1>Dashboard Pelanggaran</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard Pelanggaran</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- REKLAME Card -->
            <div class="col-xxl-4 col-md-4">

              <div class="card info-card sales-card hover-light">

                <a href="{{ url('pelanggaran') }}?id_kegiatan=1">
                   
                  <div class="card-body">
                  <h5 class="card-title">Reklame <span>| Bulan Ini</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="background: #fef9e9">
                      <img src="assets/img/ad.png" style="max-width: 40px;">
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

            <!-- PKL Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

              <a href="{{ url('pelanggaran') }}?id_kegiatan=2">
                <div class="card-body">
                  <h5 class="card-title">PKL <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                       <img src="assets/img/gerobak.png" style="max-width: 40px;">
                    </div>
                    <div class="ps-3">
                      <h6>{{ $data[1] }}</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                    </div>
                  </div>
                </div>
              </a>

              </div>
            </div><!-- End Reklame Card -->

            <!-- GEPENG Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                  <a href="{{ url('pelanggaran') }}?id_kegiatan=3">

                  <div class="card-body">
                    <h5 class="card-title">AnJal-GePeng <span>| This Month</span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <img src="assets/img/gepeng.png" style="max-width: 50px;">
                      </div>
                      <div class="ps-3">
                         <h6>{{ $data[2] }}</h6>
                        {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                      </div>
                    </div>
                  </div>
                </a>

              </div>
            </div><!-- End GEPENG Card -->

            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                  <a href="{{ url('pelanggaran') }}?id_kegiatan=4">

                <div class="card-body">
                  <h5 class="card-title">PSK <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-gender-ambiguous" style="color: #6a510d"></i>
                    </div>
                    <div class="ps-3">
                       <h6>{{ $data[3] }}</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                    </div>
                  </div>
                </div>

                </a>

              </div>
            </div><!-- End PSK Card -->


            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <a href="{{ url('pelanggaran') }}?id_kegiatan=5">

                <div class="card-body">
                  <h5 class="card-title"> Minol <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                       <img src="assets/img/beer.png" style="max-width: 40px;">
                    </div>
                    <div class="ps-3">
                       <h6>{{ $data[4] }}</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                    </div>
                  </div>
                </div>

              </a>

              </div>
            </div><!-- End Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

               <a href="{{ url('pelanggaran') }}?id_kegiatan=6">

                <div class="card-body">
                  <h5 class="card-title">Pemondokan <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-house-fill" style="color: #6a510d"></i>
                    </div>
                    <div class="ps-3">
                       <h6>{{ $data[5] }}</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                    </div>
                  </div>
                </div>

              </a>

              </div>
            </div><!-- End Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <a href="{{ url('pelanggaran') }}?id_kegiatan=7">

                <div class="card-body">
                  <h5 class="card-title">Parkir Liar <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                         <img src="assets/img/park.png" style="max-width: 50px;">
                    </div>
                    <div class="ps-3">
                       <h6>{{ $data[6] }}</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                    </div>
                  </div>
                </div>

                </a>

              </div>
            </div><!-- End Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

               <a href="{{ url('pelanggaran') }}?id_kegiatan=8">

                <div class="card-body">
                  <h5 class="card-title">Prokes <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <img src="assets/img/mask.png" style="max-width: 60px;">
                    </div>
                    <div class="ps-3">
                       <h6>{{ $data[7] }}</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                    </div>
                  </div>
                </div>

                </a>

              </div>
            </div><!-- End Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">

                <a href="#" onclick="underConstruction()">

                <div class="card-body">
                  <h5 class="card-title">Pengaduan <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <img src="assets/img/pengaduan.png" style="max-width: 50px;">
                    </div>
                    <div class="ps-3">
                       <h6>{{ $data[8] }}</h6>
                      {{-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                    </div>
                  </div>
                </div>

              </a>

              </div>
            </div><!-- End Revenue Card -->

           

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
       
      </div>
    </section>
   

@endsection