<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{URL::to('/')}}/assets/img/favicon.png" rel="icon">
  <link href="{{URL::to('/')}}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{URL::to('/')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{URL::to('/')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{URL::to('/')}}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{URL::to('/')}}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{URL::to('/')}}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{URL::to('/')}}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{URL::to('/')}}/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{URL::to('/')}}/assets/css/style.css" rel="stylesheet">

  <script src='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.js'></script>
  <link href='https://api.mapbox.com/mapbox-gl-js/v2.8.1/mapbox-gl.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<style type="text/css">
  
  .dashboard .revenue-card .card-icon{
    color: black;
  }

  .hover-light:hover{
    background-color: rgb(246,249,255);
  }

</style>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="{{URL::to('/')}}/assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">WebApp</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

 

    
  </header><!-- End Header -->

 

  <main id="main" class="main" style="margin-left: 0px;">

    @yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer" style="margin-left: 0px;">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{URL::to('/')}}/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{URL::to('/')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{URL::to('/')}}/assets/vendor/chart.js/chart.min.js"></script>
  <script src="{{URL::to('/')}}/assets/vendor/echarts/echarts.min.js"></script>
  <script src="{{URL::to('/')}}/assets/vendor/quill/quill.min.js"></script>
  <script src="{{URL::to('/')}}/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{URL::to('/')}}/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{URL::to('/')}}/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{URL::to('/')}}/assets/js/main.js"></script>



   <script type="text/javascript">
      
      function underConstruction(){

        alert('under construction');
      }



    </script>

</body>

</html>