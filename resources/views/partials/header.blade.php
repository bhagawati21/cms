<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ setting('site.title') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link rel="icon" href="{{url('assets/img/favicon.png')}}">
  <link rel="apple-touch-icon" href="{{url('assets/img/apple-touch-icon.png')}}"> -->

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="{{url('assets/vendor/bootstrap/css/bootstrap.min.css')}}" >
  <link rel="stylesheet" href="{{url('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" >
  <link rel="stylesheet" href="{{url('assets/vendor/swiper/swiper-bundle.min.css')}}" >
  <link rel="stylesheet" href="{{url('assets/vendor/glightbox/css/glightbox.min.css')}}" >
  <link rel="stylesheet" href="{{url('assets/vendor/aos/aos.css" rel="stylesheet')}}">

  <!-- Template Main CSS Files -->
  <link href="{{url('assets/css/variables.css')}}" rel="stylesheet">
  <link href="{{url('assets/css/main.css')}}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{url('/')}}" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>{{ setting("site.title") }}</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{url('/')}}">Home</a></li>
          <li class="dropdown"><a href="#"><span>Categories</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>  
              @php 
                $categories = DB::table('categories')->select("*")->get();
              @endphp
              @foreach($categories as $category)
                <li><a href="/category/{{$category->slug}}">{{$category->name}}</a></li>              
              @endforeach
            </ul>
          </li>
          <li><a href="{{url('/about')}}">About</a></li>
          <li><a href="{{url('/contact')}}">Contact</a></li>
          @if(Auth::check())
            @php
              $user = Auth::user();
            @endphp
            <li><a href="#" style="cursor: default;"> {{ $user->name }}</a></li>
            <li><a class="text-danger" href="{{ route('logout') }}">Logout</a></li>
          @else
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
          @endif
        </ul>
      </nav><!-- .navbar -->

      <div class="position-relative">

        <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
        <i class="bi bi-list mobile-nav-toggle"></i>

        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">
          <form action="/search/" class="search-form" method="post">
            @csrf
            <span class="icon bi-search"></span>
            <input type="text" placeholder="Search" name="search" class="form-control">
            <input type="submit" name="" style="display:none">
            <button class="btn js-search-close"><span class="bi-x"></span></button>
          </form>
        </div><!-- End Search Form -->

      </div>

    </div>

  </header><!-- End Header -->