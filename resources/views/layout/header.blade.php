<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>DiceBoyScripts</title>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&amp;display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" sizes="16x16" href="images/favicon.png">

    <!-- inject:css -->
    <link href="{{ asset('disilab/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('disilab/css/line-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('disilab/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('disilab/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('disilab/css/selectize.css') }}">
    <link rel="stylesheet" href="{{ asset('disilab/css/style.css') }}">
    <!-- end inject -->
        <style>
        pre,.script-description{
            max-width: 91%;
        }
    </style>
</head>
<body>

    <!-- start cssload-loader -->
    <div id="preloader">
        <div class="loader">
            <svg class="spinner" viewBox="0 0 50 50">
                <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
            </svg>
        </div>
    </div>
    <!-- end cssload-loader -->

<!--======================================
        START HEADER AREA
        ======================================-->
        <header class="header-area bg-white">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2">
                        <div class="logo-box">
                            <a href="{{ url('/') }}" class="logo"><img src="{{ asset('disilab/images/logo9.jpeg')}}" alt="logo"></a>
                            <div class="user-action">
                                <div class="search-menu-toggle icon-element icon-element-xs shadow-sm mr-1" data-toggle="tooltip" data-placement="top" title="Search">
                                    <i class="la la-search"></i>
                                </div>
                                <div class="off-canvas-menu-toggle icon-element icon-element-xs shadow-sm" data-toggle="tooltip" data-placement="top" title="Main menu">
                                    <i class="la la-bars"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col-lg-2 -->
                    <div class="col-lg-10">
                        <div class="menu-wrapper border-left border-left-gray pl-4 justify-content-end">
                            <nav class="menu-bar mr-auto">
                                <ul>
                                    <li>
                                        <a href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li class="is-mega-menu">
                                        <a href="{{ url('/about') }}">About</a>

                                    </li>
                           <!--  <li>
                                <a href="#">blog <i class="la la-angle-down fs-11"></i></a>
                              
                            </li> -->
                        </ul><!-- end ul -->
                    </nav><!-- end main-menu -->
                    
                    @if(!empty(Auth::user()) && Auth::user()->email_verified_at)
                    <div class="nav-right-button">
                        <ul class="user-action-wrap d-flex align-items-center">
                            <li class="dropdown user-dropdown">
                                <a class="nav-link dropdown-toggle dropdown--toggle pl-2" href="#" id="userMenuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="media media-card media--card shadow-none mb-0 rounded-0 align-items-center bg-transparent">
                                        <div class="media-img media-img-xs flex-shrink-0 rounded-full mr-2">
        <img src="{{asset('storage/app/'.Auth::user()->profile_photo_path)}}" alt="avatar" class="rounded-full">
                                        </div>
                                        <div class="media-body p-0 border-left-0">
                                            <h5 class="fs-14">{{Auth::user()->name}}</h5>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown--menu dropdown-menu-right mt-3 keep-open" aria-labelledby="userMenuDropdown">
                                    <h6 class="dropdown-header">Hi,{{Auth::user()->name}}</h6>
                                    <div class="dropdown-divider border-top-gray mb-0"></div>
                                    <div class="dropdown-item-list">
                                        <a class="dropdown-item" href="{{url('admin/dashboard')}}"><i class="la la-user mr-2"></i>Dashboard</a>
                                        <form action="{{URL::to('logout')}}" method="post">
                                            @csrf
                                        <a class="dropdown-item"><i class="la la-power-off mr-2"></i><button type="submit" style="background-color: white;border: none;">Logout</button></a>
                                        </form>
                                        <!-- <a class="dropdown-item" href="{{route('logout')}}"><i class="la la-power-off mr-2"></i>Log out</a> -->
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div><!-- end nav-right-button -->
                    @else

                    <div class="nav-right-button">
                        <a href="{{url('login')}}" class="btn theme-btn theme-btn-outline mr-2"><i class="la la-sign-in mr-1"></i> Login</a>
                        <a href="{{url('register')}}" class="btn theme-btn"><i class="la la-user mr-1"></i> Sign up</a>
                    </div><!-- end nav-right-button -->
                    @endif
                </div><!-- end menu-wrapper -->
            </div><!-- end col-lg-10 -->
        </div><!-- end row -->
    </div><!-- end container -->
     <div class="off-canvas-menu custom-scrollbar-styled">
        <div class="off-canvas-menu-close icon-element icon-element-sm shadow-sm" data-toggle="tooltip" data-placement="left" title="Close menu">
            <i class="la la-times"></i>
        </div><!-- end off-canvas-menu-close -->
        <ul class="generic-list-item off-canvas-menu-list pt-90px">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">About</a>
            </li>
        </ul>
        <div class="off-canvas-btn-box px-4 pt-5 text-center">
            <a href="#" class="btn theme-btn theme-btn-sm theme-btn-outline" data-toggle="modal" data-target="#loginModal"><i class="la la-sign-in mr-1"></i> Login</a>
            <span class="fs-15 fw-medium d-inline-block mx-2">Or</span>
            <a href="#" class="btn theme-btn theme-btn-sm" data-toggle="modal" data-target="#signUpModal"><i class="la la-plus mr-1"></i> Sign up</a>
        </div>
    </div><!-- end off-canvas-menu -->

    <div class="mobile-search-form">
        <div class="d-flex align-items-center">
            <form method="post" class="flex-grow-1 mr-3">
                <div class="form-group mb-0">
                    <input class="form-control form--control pl-40px" type="text" name="search" placeholder="Type your search words...">
                    <span class="la la-search input-icon"></span>
                </div>
            </form>
            <div class="search-bar-close icon-element icon-element-sm shadow-sm">
                <i class="la la-times"></i>
            </div><!-- end off-canvas-menu-close -->
        </div>
    </div><!-- end mobile-search-form -->
    <div class="body-overlay"></div>
</header><!-- end header-area -->
<!--======================================
        END HEADER AREA
        ======================================-->