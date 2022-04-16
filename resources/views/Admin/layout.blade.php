<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Dice Boy Script</title>

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

    <link rel="stylesheet" href="{{ asset('disilab/css/jquery-te-1.4.0.css')}}">
    <link rel="stylesheet" href="{{ asset('disilab/css/upvotejs.min.css')}}">
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
                            <a href="{{url('/')}}" class="logo"><img src="{{ asset('disilab/images/logo9.jpeg')}}" alt="logo"></a>
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

                   <div class="nav-right-button">
                        <ul class="user-action-wrap d-flex align-items-center">
                            <li class="dropdown user-dropdown">
                                <a class="nav-link dropdown-toggle dropdown--toggle pl-2" href="#" id="userMenuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="media media-card media--card shadow-none mb-0 rounded-0 align-items-center bg-transparent">
                                        <div class="media-img media-img-xs flex-shrink-0 rounded-full mr-2">
                                            <img src="{{asset('storage/app/'.Auth::user()->profile_photo_path)}}" alt="avatar" class="rounded-full">
                                        </div>
                                        <div class="media-body p-0 border-left-0">
                                            <h5 class="fs-14">{{Auth::user()->name ?? ''}}</h5>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown--menu dropdown-menu-right mt-3 keep-open" aria-labelledby="userMenuDropdown">
                                    <h6 class="dropdown-header">Hi,{{Auth::user()->name ?? ''}}</h6>
                                    <div class="dropdown-divider border-top-gray mb-0"></div>
                                    <div class="dropdown-item-list">
                                        <a class="dropdown-item" href="{{url('admin/profile')}}"><i class="la la-user mr-2"></i>Profile</a>
                                        <!-- <a class="dropdown-item" href="referrals.html"><i class="la la-user-plus mr-2"></i>Referrals</a>
                                        <a class="dropdown-item" href="{{url('editprofile')}}"><i class="la la-gear mr-2"></i>Settings</a> -->
                                        <form action="{{URL::to('logout')}}" method="post">
                                            @csrf
                                        <a class="dropdown-item"><i class="la la-power-off mr-2"></i><button type="submit" style="background-color: white;border: none;">Logout</button></a>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div><!-- end nav-right-button -->
                    
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

        <!--======================================
        START HERO AREA
        ======================================-->
        <section class="hero-area bg-white shadow-sm overflow-hidden pt-60px">
            <span class="stroke-shape stroke-shape-1"></span>
            <span class="stroke-shape stroke-shape-2"></span>
            <span class="stroke-shape stroke-shape-3"></span>
            <span class="stroke-shape stroke-shape-4"></span>
            <span class="stroke-shape stroke-shape-5"></span>
            <span class="stroke-shape stroke-shape-6"></span>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="hero-content">
                            <div class="media media-card align-items-center shadow-none p-0 mb-0 rounded-0 bg-transparent">
                                <div class="media-img media--img">
                                    <img src="{{asset('storage/app/'.Auth::user()->profile_photo_path)}}" alt="avatar">
                                </div>
                                <div class="media-body">
                                    <h5>{{Auth::user()->name ?? ''}}</h5>
                                    <small class="meta d-block lh-20 pb-2">
                                        <span>{{Auth::user()->email ?? ''}}</span>
                                    </small>
                                    <!-- <div class="stats fs-14 fw-medium d-flex align-items-center lh-18">
                                        <span class="text-black pr-2" title="Reputation">224,110</span>
                                        <span class="pr-2 d-inline-flex align-items-center" title="Gold"><span class="ball ml-1 gold"></span>16</span>
                                        <span class="pr-2 d-inline-flex align-items-center" title="Silver"><span class="ball ml-1 silver"></span>93</span>
                                        <span class="pr-2 d-inline-flex align-items-center" title="Bronze"><span class="ball ml-1"></span>136</span>
                                    </div> -->
                                </div>
                            </div><!-- end media -->
                        </div><!-- end hero-content -->
                    </div><!-- end col-lg-8 -->
                    <div class="col-lg-4">
                        <div class="hero-btn-box text-right py-3">
                            <a href="{{url('admin/profile')}}" class="btn theme-btn theme-btn-outline theme-btn-outline-gray"><i class="la la-gear mr-1"></i> Edit Profile</a>
                        </div>
                    </div><!-- end col-lg-4 -->


                    <div class="col-lg-12">
                        <ul class="nav nav-tabs generic-tabs generic--tabs generic--tabs-2 mt-4" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="user-profile-tab"  href="{{url('admin/profile')}}" role="tab" aria-controls="user-profile" aria-selected="true">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="user-profile-tab"  href="{{url('admin/dashboard')}}" role="tab" aria-controls="user-profile" aria-selected="true">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="user-profile-tab"  href="{{url('admin/all-users')}}" role="tab" aria-controls="user-profile" aria-selected="true">All Users</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="user-activity-tab" href="{{url('admin/all-scripts')}}" role="tab" aria-controls="user-activity" aria-selected="false">All Scripts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="user-activity-tab" href="{{url('admin/pending-scripts')}}" role="tab" aria-controls="user-activity" aria-selected="false">Pending Scripts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="user-activity-tab" href="{{url('admin/approved-scripts')}}" role="tab" aria-controls="user-activity" aria-selected="false">Approved Scripts</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="user-activity-tab" href="{{url('admin/declined-scripts')}}" role="tab" aria-controls="user-activity" aria-selected="false">Declined Scripts</a>
                            </li>
                        </ul>
                    </div><!-- end col-lg-4 -->


                </div><!-- end row -->
            </div><!-- end container -->
        </section>
<!--======================================
        END HERO AREA
        ======================================-->


       

        @yield('content')

<!-- ================================
         START FOOTER AREA
         ================================= -->
         <section class="footer-area pt-80px bg-dark position-relative">
            <span class="vertical-bar-shape vertical-bar-shape-1"></span>
            <span class="vertical-bar-shape vertical-bar-shape-2"></span>
            <span class="vertical-bar-shape vertical-bar-shape-3"></span>
            <span class="vertical-bar-shape vertical-bar-shape-4"></span>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 responsive-column-half">
                    <div class="footer-item">
                            <h3 class="fs-18 fw-bold pb-2 text-white">Company</h3>
                            <ul class="generic-list-item generic-list-item-hover-underline pt-3 generic-list-item-white">
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li><a href="{{url('about')}}">About</a></li>
                            </ul>
                        </div><!-- end footer-item -->
                    </div><!-- end col-lg-3 -->
                    <div class="col-lg-3 responsive-column-half">
                    <div class="footer-item">
                            <h3 class="fs-18 fw-bold pb-2 text-white">Legal Stuff</h3>
                            <ul class="generic-list-item generic-list-item-hover-underline pt-3 generic-list-item-white">
                                <li><a href="#">Privacy Policy</a></li>
                                </ul>
                            </div><!-- end footer-item -->
                    </div><!-- end col-lg-3 -->
                    <div class="col-lg-3 responsive-column-half">
                    <div class="footer-item">
                                <h3 class="fs-18 fw-bold pb-2 text-white">Help</h3>
                                <ul class="generic-list-item generic-list-item-hover-underline pt-3 generic-list-item-white">
                                    <li><a href="#">Support</a></li>
                                </ul>
                            </div><!-- end footer-item -->
                    </div><!-- end col-lg-3 -->
                    <div class="col-lg-3 responsive-column-half">
                        <div class="footer-item">
                            <h3 class="fs-18 fw-bold pb-2 text-white">Connect with us</h3>
                            <ul class="generic-list-item generic-list-item-hover-underline pt-3 generic-list-item-white">
                                <li><a href="#"><i class="la la-facebook mr-1"></i> Facebook</a></li>
                                <li><a href="#"><i class="la la-twitter mr-1"></i> Twitter</a></li>
                                <li><a href="#"><i class="la la-linkedin mr-1"></i> LinkedIn</a></li>
                                <li><a href="#"><i class="la la-instagram mr-1"></i> Instagram</a></li>
                            </ul>
                        </div><!-- end footer-item -->
                    </div><!-- end col-lg-3 -->
                </div><!-- end row -->
            </div><!-- end container -->
            <hr class="border-top-gray my-5">
            <div class="container">
                <div class="row align-items-center pb-4 copyright-wrap">
                    <div class="col-lg-6">
                        <a href="{{url('/')}}" class="d-inline-block">
                            <img src="{{ asset('disilab/images/logo9.jpeg')}}" alt="footer logo" class="footer-logo">
                        </a>
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <p class="copyright-desc text-right fs-14">Copyright &copy; 2021 <a href="https://diceboyscript.com/">DiceBoyScript</a> Inc.</p>
                    </div><!-- end col-lg-6 -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end footer-area -->
<!-- ================================
          END FOOTER AREA
          ================================= -->

          <!-- start back to top -->
          <div id="back-to-top" data-toggle="tooltip" data-placement="top" title="Return to top">
            <i class="la la-arrow-up"></i>
        </div>
        <!-- end back to top -->

        <!-- Modal -->
        <div class="modal fade modal-container login-form" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header align-items-center">
                        <h5 class="modal-title" id="loginModalTitle">Good to see you again!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="la la-times"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <div class="form-group">
                                <label class="fs-14 text-black fw-medium lh-18">Email</label>
                                <input class="form-control form--control" type="email" name="email" placeholder="Email address">
                            </div>
                            <div class="form-group">
                                <label class="fs-14 text-black fw-medium lh-18">Password</label>
                                <div class="input-group mb-1">
                                    <input class="form-control form--control password-field" type="password" name="password" placeholder="Enter password">
                                    <div class="input-group-append">
                                        <button class="btn theme-btn-outline theme-btn-outline-gray toggle-password" type="button">
                                            <svg class="eye-on" xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 0 24 24" width="22px" fill="#7f8897"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z"/></svg>
                                            <svg class="eye-off" xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 0 24 24" width="22px" fill="#7f8897"><path d="M0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"/><path d="M12 6c3.79 0 7.17 2.13 8.82 5.5-.59 1.22-1.42 2.27-2.41 3.12l1.41 1.41c1.39-1.23 2.49-2.77 3.18-4.53C21.27 7.11 17 4 12 4c-1.27 0-2.49.2-3.64.57l1.65 1.65C10.66 6.09 11.32 6 12 6zm-1.07 1.14L13 9.21c.57.25 1.03.71 1.28 1.28l2.07 2.07c.08-.34.14-.7.14-1.07C16.5 9.01 14.48 7 12 7c-.37 0-.72.05-1.07.14zM2.01 3.87l2.68 2.68C3.06 7.83 1.77 9.53 1 11.5 2.73 15.89 7 19 12 19c1.52 0 2.98-.29 4.32-.82l3.42 3.42 1.41-1.41L3.42 2.45 2.01 3.87zm7.5 7.5l2.61 2.61c-.04.01-.08.02-.12.02-1.38 0-2.5-1.12-2.5-2.5 0-.05.01-.08.01-.13zm-3.4-3.4l1.75 1.75c-.23.55-.36 1.15-.36 1.78 0 2.48 2.02 4.5 4.5 4.5.63 0 1.23-.13 1.77-.36l.98.98c-.88.24-1.8.38-2.75.38-3.79 0-7.17-2.13-8.82-5.5.7-1.43 1.72-2.61 2.93-3.53z"/></svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <div class="custom-control custom-checkbox fs-14">
                                    <input type="checkbox" class="custom-control-input" id="rememberMe">
                                    <label class="custom-control-label custom--control-label" for="rememberMe">Remember me!</label>
                                </div>
                                <a href="javascript:void(0)" class="lost-pass-btn fs-14 hover-underline">Forgot Password?</a>
                            </div>
                            <div class="btn-box">
                                <button type="submit" class="btn theme-btn w-100">
                                    Login to Account <i class="la la-arrow-right icon ml-1"></i>
                                </button>
                            </div>
                            <p class="create-account-text text-right fs-14 pt-1">
                                New to diceboy? <a class="signup-btn text-color hover-underline" href="javascript:void(0)">Create account</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade modal-container signup-form" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="signUpModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header align-items-center">
                        <h5 class="modal-title" id="signUpModalTitle">Welcome! create your account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="la la-times"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('signup')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="fs-14 text-black fw-medium lh-18">Username</label>
                                <input id=""
                                type="text"
                                name="username"
                                class="@error('username') is-invalid  @enderror form-control form--control"
                                placeholder="Username"
                                value="{{ old('username') }}">
                                @error('username')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="fs-14 text-black fw-medium lh-18">Email</label>
                                <input 
                                class="@error('email')  is-invalid  @enderror form-control form--control" 
                                type="email" 
                                name="email" 
                                placeholder="Email address"
                                value="{{ old('email') }}">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="fs-14 text-black fw-medium lh-18">Password</label>
                                <div class="input-group mb-1">
                                    <input 
                                    class="@error('password') is-invalid @enderror form-control form--control password-field" 
                                    type="password" 
                                    name="password" 
                                    placeholder="Enter password">

                                    <div class="input-group-append">
                                        <button class="btn theme-btn-outline theme-btn-outline-gray toggle-password" type="button">
                                            <svg class="eye-on" xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 0 24 24" width="22px" fill="#7f8897"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z"/></svg>
                                            <svg class="eye-off" xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 0 24 24" width="22px" fill="#7f8897"><path d="M0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none"/><path d="M12 6c3.79 0 7.17 2.13 8.82 5.5-.59 1.22-1.42 2.27-2.41 3.12l1.41 1.41c1.39-1.23 2.49-2.77 3.18-4.53C21.27 7.11 17 4 12 4c-1.27 0-2.49.2-3.64.57l1.65 1.65C10.66 6.09 11.32 6 12 6zm-1.07 1.14L13 9.21c.57.25 1.03.71 1.28 1.28l2.07 2.07c.08-.34.14-.7.14-1.07C16.5 9.01 14.48 7 12 7c-.37 0-.72.05-1.07.14zM2.01 3.87l2.68 2.68C3.06 7.83 1.77 9.53 1 11.5 2.73 15.89 7 19 12 19c1.52 0 2.98-.29 4.32-.82l3.42 3.42 1.41-1.41L3.42 2.45 2.01 3.87zm7.5 7.5l2.61 2.61c-.04.01-.08.02-.12.02-1.38 0-2.5-1.12-2.5-2.5 0-.05.01-.08.01-.13zm-3.4-3.4l1.75 1.75c-.23.55-.36 1.15-.36 1.78 0 2.48 2.02 4.5 4.5 4.5.63 0 1.23-.13 1.77-.36l.98.98c-.88.24-1.8.38-2.75.38-3.79 0-7.17-2.13-8.82-5.5.7-1.43 1.72-2.61 2.93-3.53z"/></svg>
                                        </button>
                                    </div>

                                </div>
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <p class="fs-14 lh-20">Your password must be at least 6 characters long and must contain letters, numbers and special characters. Cannot contain whitespace.</p>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox fs-14">
                                    <input type="checkbox" class="custom-control-input" id="agreeCheckBox">
                                    <label class="custom-control-label custom--control-label" for="agreeCheckBox">By signing up, you agree to our <a href="privacy-policy.html" class="text-color hover-underline">Privacy Policy.</a></label>
                                </div>
                            </div>
                            <div class="btn-box">
                                <button type="submit" class="btn theme-btn w-100">
                                    Register Account <i class="la la-arrow-right icon ml-1"></i>
                                </button>
                            </div>
                            <p class="create-account-text text-right fs-14">
                                Already on diceboy? <a class="login-btn text-color hover-underline" href="javascript:void(0)">Log in</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->


        <!-- template js files -->
        <script src="{{ asset('disilab/js/jquery-3.4.1.min.js')}}"></script>
        <script src="{{ asset('disilab/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('disilab/js/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('disilab/js/jquery-te-1.4.0.min.js')}}"></script>
        <script src="{{ asset('disilab/js/jquery.multi-file.min.js')}}"></script>
        <script src="{{ asset('disilab/js/selectize.min.js')}}"></script>
        <script src="{{ asset('disilab/js/main.js')}}"></script>

        <script>
            $(document).ready(function(){
                $('.orderBy').change(function() {
                var showByorder=$('.orderBy').val();
                $.ajax({
                   type:'POST',
                   url:'{{url('orderBy')}}',
                   data:{_token: "{{ csrf_token() }}", showByorder:showByorder },
                   success:function(data) {
                         $("#question").html(data);
                   }
               });
            });
            });

        </script>


    </body>

    </html>