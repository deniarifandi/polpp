
  
  @extends('layouts.main')

  @section('title','data pelanggaran')

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

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Berhasil tambah Data Pelanggaran
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <section class="section dashboard">
      <div class="row">

         <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Jenis Penertiban</h5>

             <canvas id="barChart" style="max-height: 400px;"></canvas>
              <script>

                var colorList = [
                          'rgba(255, 99, 132, 0.5)',
                          'rgba(255, 159, 64, 0.5)',
                          'rgba(255, 205, 86, 0.5)',
                          'rgba(75, 192, 192, 0.5)',
                          'rgba(54, 162, 235, 0.5)',
                          'rgba(153, 102, 255, 0.5)',
                          'rgba(201, 203, 207, 0.5)',
                          'rgba(100, 162, 155, 0.5)'
                        ];

                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#barChart'), {
                    type: 'bar',
                    data: {
                      labels: ['Jenis pelanggaran'],
                      datasets: [
                        @php 
                        $maxValue = 0;
                        for($i=0; $i < count($data); $i++) { 
                        @endphp
                        {
                          label: '{{ $data[$i]->nama}}',
                          backgroundColor: colorList[{{$i}}],
                          data: [{{ $data[$i]->total }}]
                        },
                        
                        @php 
                          if ($maxValue < $data[$i]->total) {
                            $maxValue = $data[$i]->total*120/100;
                          }
                          } //for
                        @endphp
                      

                      ]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true,
                          max: {{$maxValue}},
                        }
                      },
                      plugins: {
                          legend: {
                              display: true,
                              labels: {
                                  color: 'rgb(255, 99, 132)'
                              }
                          }
                      }
                    }
                  });
                });
              </script>

            </div>
          </div>
        </div>

         <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Lokasi Pelanggaran</h5>

             <canvas id="barChart2" style="max-height: 400px;"></canvas>
              <script>

                var colorList = [
                          'rgba(255, 99, 132, 0.5)',
                          
                          'rgba(255, 205, 86, 0.5)',
                          'rgba(75, 192, 192, 0.5)',
                          'rgba(255, 159, 64, 0.5)',
                          'rgba(54, 162, 235, 0.5)',
                          'rgba(153, 102, 255, 0.5)',
                          'rgba(201, 203, 207, 0.5)',
                          'rgba(100, 162, 155, 0.5)'
                        ];

                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#barChart2'), {
                    type: 'pie',
                    data: {
                      labels: [
                         @php 
                              for ($i=0; $i < count($kecamatans); $i++) { 
                            @endphp
                            '{{ $kecamatans[$i]->nama }}',

                            @php
                              }
                            @endphp
                      ],
                      datasets: [
                      

                          {
                            label: 'lokasi pelanggaran',
                            backgroundColor: colorList,
                            data: [
                            @php 
                              for ($i=0; $i < count($kecamatans); $i++) { 
                            @endphp
                            {{ $kecamatans[$i]->total }},

                            @php
                              }
                            @endphp
                            ]
                          },
                     
                      

                      ]
                    },
                  
                  });
                });
              </script>

            </div>
          </div>
        </div>
       
      </div>
    </section>



    @endsection