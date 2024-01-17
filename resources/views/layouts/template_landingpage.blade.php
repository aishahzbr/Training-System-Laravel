<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Welcome to Laravel Trainings</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('landingpage/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('landingpage/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('landingpage/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('landingpage/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('landingpage/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('landingpage/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('landingpage/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('landingpage/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('landingpage/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('landingpage/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{ url('/') }}">Laravel</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
        @guest
            <li><a class="nav-link scrollto" href="{{ url('/login') }}">Login</a></li>
            <li><a class="nav-link scrollto" href="{{ url('/register') }}">Register</a></li>
        @else
            @if(auth()->user()->role == 'trainer')
                <li><a class="nav-link scrollto active" href="{{ route('trainer.home') }}">Dashboard Trainer</a></li>
            @else
                <li><a class="nav-link scrollto active" href="{{ url('/home') }}">Dashboard</a></li>
            @endif
        @endguest 

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
         
          <h1>Your ICT Training Partner</h1>

            <div id="footer">
              <div class="footer-newsletter">
                    <div class="col-lg-10">
                    <form class="form-inline" method="GET" action="{{ route('search:search') }}">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Search training here..." name="keyword" value="{{ request()->get('keyword') }}">
                            &nbsp;&nbsp;
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                                <!-- <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button> -->
                               
                            </div>
                        </div>
                    </form>
                    </div>
              </div>
            </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{asset('landingpage/assets/img/hero-img.png')}}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
  
  <br>

  <!-- Add this container div to wrap the training listing content -->
<div id="training-list-container">
    @yield('content')
</div>


  <br>


  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('landingpage/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('landingpage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('landingpage/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('landingpage/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('landingpage/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('landingpage/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('landingpage/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('landingpage/assets/js/main.js')}}"></script>

</body>

</html>