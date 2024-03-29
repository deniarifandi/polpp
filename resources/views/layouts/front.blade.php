<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Aplikasi Trantibum Satpol-PP</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets2/img/favicon.png" rel="icon">
  <link href="assets2/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets2/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets2/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets2/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets2/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
     <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-3d.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        <script src='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js'></script>
  <link href='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css' rel='stylesheet' />
  <!-- Template Main CSS File -->
  <link href="assets2/css/style.css" rel="stylesheet">
   {{-- <script src="https://www.google.com/recaptcha/api.js"></script> --}}

  <!-- =======================================================
  * Template Name: Knight - v4.7.0
  * Template URL: https://bootstrapmade.com/knight-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<style>

#map {height: 250px; width: 100%; }
</style>

<body>


  <!-- ======= Hero Section ======= -->
   

  <section id="hero">

    <div class="hero-container">
      <a href="front" class="hero-logo" data-aos="zoom-in"><img src="assets2/img/logopolpplarge.png" alt="" style="max-width: 300px"></a>
      <h1 data-aos="zoom-in">{{ $admin[0]->value }}</h1>
      <h2 data-aos="fade-up" style="font-size: 25px">Satpol PP Kota Malang</h2>

      <a data-aos="fade-up" data-aos-delay="200" href="#contact" class="btn-get-started scrollto">Pelaporan Gangguan</a>
    </div>
  </section><!-- End Hero -->

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <a href="index.html"><img src="assets2/img/logopolpp.png" alt="" class="img-fluid" style="max-width: 150px"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#twitter">Kabar Terkini</a></li>
        
          
        
          <li><a class="nav-link scrollto" href="#contact">Contact & Laporan</a></li>

            <li><a class="nav-link scrollto" href="{{URL::to('/login') }}">
              @if(Auth::id())
              Dashboard
              @else
              Login
              @endif
            </a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

        <!-- ======= About Us Section ======= -->
    <section id="about" class="about" style="display:none">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Tentang Kami</h2>
      
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right">
            <div class="image">
              <img src="assets2/img/polpp1.jpg" class="img-fluid" alt="">
            </div>

          </div>
          <div class="col-lg-6" data-aos="fade-left">
            <div class="content pt-4 pt-lg-0 pl-0 pl-lg-3 ">
              <br>
              <p>Satuan Polisi Pamong Praja Provinsi Jawa Timur mempunyai tugas menegakkan peraturan daerah dan peraturan pelaksanaannya, menyelenggarakan ketertiban umum dan ketenteraman, pengawasan serta perlindungan masyarakat</p>
             <br>
              <ul>
                <li><i class="bx bx-check-double"></i> Penyusunan program dan pelaksanaan penegakan peraturan daerah dan peraturan gubernur, penyelenggaraan ketertiban umum dan ketenteraman masyarakat serta perlindungan masyarakat</li>
                <br>
                <li><i class="bx bx-check-double"></i> Pelaksanaan penegakan peraturan daerah dan peraturan gubernur.</li>
                
              </ul>
            </div>
          </div>
        
        </div>

      </div>
    </section><!-- End About Us Section -->

      <section id="twitter" class="contact section-bg" style="padding-bottom:20px">
      <div class="container">

        <div class="section-title">
          <h2>Kabar Terkini</h2>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <a class="twitter-timeline" data-height="1000" data-lang="id" data-theme="dark" href="https://twitter.com/satpolppmalang2?ref_src=twsrc%5Etfw">Tweets by TwitterDev</a> 
            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>  

          </div>

          <div class="col-lg-8">

            <div class="row">

              <div class="col-lg-12-">
                <form id="laporan_form" method="post" role="form" class="php-email-form"  enctype="multipart/form-data" style="margin-bottom:25px">
                  <div class="row">
                      <div class="col-md-12">
                    @include('graph.grafik_total_kegiatan')
                  </div>
                 
                  </div>
                </form>                 
              </div>

               <div class="col-lg-6">

                  <form id="laporan_form" method="post" role="form" class="php-email-form"  enctype="multipart/form-data" style="margin-bottom:25px"> 
                    <div class="row">
                        <div class="col-md-12">
                      @include('graph.lokasi_pelanggaran')
                    </div>
                   
                    </div>
                  </form>

                </div>

                 <div class="col-lg-6">

                    <form id="laporan_form" method="post" role="form" class="php-email-form"  enctype="multipart/form-data" style="margin-bottom: 25px">
                    <div class="row">
                        <div class="col-md-12">
                      @include('graph.jenis_penertiban')
                    </div>
                   
                    </div>
                  </form>
                 

                </div>
                    
                    
            </div>
            



          </div>  
      

          
          

         


        </div>

      </div>
    </section><!-- End Contact Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services" style="display:none">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Services</h2>
          <p>Tugas dan Fungsi</p>
        </div>

        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1">
            <div class="icon-box mt-5 mt-lg-0" data-aos="fade-up">
              <i class="bx bx-receipt"></i>
           
              <p>Penyusunan program dan pelaksanaan penegakan peraturan daerah dan peraturan gubernur, penyelenggaraan ketertiban umum dan ketenteraman masyarakat serta perlindungan masyarakat</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-cube-alt"></i>
             
              <p>Pelaksanaan penegakan peraturan daerah dan peraturan gubernur</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-images"></i>
              
              <p>Pelaksanaan kebijakan penyelenggaraan ketertiban umum dan ketenteraman masyarakat di daerah</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-shield"></i>
             
              <p>Pelaksanaan kebijakan perlindungan masyarakat</p>
            </div>
          </div>
          <div class="image col-lg-6 order-1 order-lg-2"  data-aos="fade-left" data-aos-delay="100">
            
            <img src="assets2/img/polpp2.jpg" class="img-fluid" alt="">

          </div>
        </div>

        

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Featured Section ======= -->
 

    <!-- ======= Portfolio Section ======= -->
    
    
    <!-- ======= Testimonials Section ======= -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Contact & Laporan</h2>
          {{-- <p>Magnam dolores commodi suscipit eius consequatur ex aliquid fuga eum quidem</p> --}}
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="info d-flex flex-column justify-content-center" data-aos="fade-right">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>{{ $admin[1]->value }}</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>{{ $admin[2]->value }}</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>{{ $admin[3]->value }}</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="{{ route('laporan_post') }}" id="laporan_form" method="post" role="form" class="php-email-form"  enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-4 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nama" required>
                </div>
                <div class="col-md-4 form-group">
                  <input type="text" name="nik" class="form-control" id="nik" placeholder="NIK" required>
                </div>
                <div class="col-md-4 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="email" id="email" placeholder="Email/HP">
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subjek" id="subject" placeholder="Judul Laporan" required="">
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="pesan" rows="5" placeholder="Tuliskan detail pesan laporan" required=""></textarea>
              </div>
              <div class="form-group mt-3">
                <input type="file" name="fotolaporan" class="form-control" id="exampleFormControlFile1" style="height: auto" required="">
              </div>

                  <div class="row mb-3">
                  <label for="inputText" class="col-sm-4 col-form-label">Lokasi Pelanggaran</label>
                  <div class="col-sm-8">

                    <div class="row">
                      <div class="col-sm-6">
                      <input class="form-control" type="text" id="lat" name="latitude" placeholder="lat" readonly="">   
                      </div>
                      
                      <div class="col-sm-6">
                        <input class="form-control" type="text" id="lon" name="longitude" placeholder="lon" readonly="">   
                      </div>  
                      <br>
                    </div>
                    
                    <br>
                      <div id="map"></div>
                  </div>
                </div>

              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="row text-center">
                <div class="col-lg-5 offset-lg-4">
                  <div class="g-recaptcha" style="display: inline-block;" data-sitekey="6LfhYA4hAAAAAIQy4omSwNkx5aqKtXOCwt7LEHfg" data-callback="correctCaptcha">
                    </div>
                     <button type="submit" class="btn btn-primary" id="laporButton" disabled="true">Send Message</button>  
                </div>
                 
              </div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">

      <div class="container">

        <div class="row justify-content-center">
          <div class="col-lg-6">
            <a href="#header" class="scrollto footer-logo"><img src="assets2/img/logopolpp.png" alt=""></a>
            <h3>SatPol PP Malang Kota</h3>
            {{-- <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p> --}}
          </div>
        </div>

        <div class="social-links">
          <a href="https://twitter.com/satpolppmalang2" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="tel:0341353939" class="phone"><i class="bi bi-phone"></i></a>
          <a href="https://www.instagram.com/satpolpp.malangkota/" class="instagram"><i class="bx bxl-instagram"></i></a>
        <!--  <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a> -->
         <!-- <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> -->
        </div>

      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright">
       

      </div>
    
    </div>

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  

  <!-- Vendor JS Files -->
  <script src="assets2/vendor/aos/aos.js"></script>
  <script src="assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets2/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets2/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets2/vendor/swiper/swiper-bundle.min.js"></script>
 {{--  <script src="assets2/vendor/php-email-form/validate.js"></script> --}}

  <!-- Template Main JS File -->
  <script src="assets2/js/main.js"></script>

      <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiYXJpZmFuZGlkZW5pIiwiYSI6ImNsMzZvNXZxejEzbHAzY3FzcmpuNzNrbm0ifQ.-XX0gvG2ooyVnJvZZHg9Hg';
          const map = new mapboxgl.Map({
          container: 'map', // container ID
          style: 'mapbox://styles/mapbox/streets-v11', // style URL
          center: [106.82332708986368,-6.160440512853471 ], // starting position [lng, lat]
          zoom: 15 // starting zoom
        });


        map.on('click', (e) => {
          // console.log(e);
          // console.log(e.lngLat.lng);

          marker1.setLngLat(e.lngLat);
          document.getElementById("lat").value = e.lngLat.lat;
          document.getElementById("lon").value = e.lngLat.lng; 

     
          });
        
    </script>

    <script>

    marker1 = null;
    
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
          marker1 = new mapboxgl.Marker()
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
      
        (function() {
      
          getLocation();

          @if (Session::has('success'))
            alert("Berhasil Mengirimkan Laporan!");
          @else
            
          @endif
       

        })();

        function correctCaptcha() {
          console.log("capta benar");
          document.getElementById("laporButton").disabled = false;
        }


    </script>
    



</body>

</html>