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
    <link rel="stylesheet" href="{{ asset('disilab/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('disilab/css/line-awesome.css')}}">
    <link rel="stylesheet" href="{{ asset('disilab/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('disilab/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('disilab/css/jquery-te-1.4.0.css')}}">
     <link rel="stylesheet" href="{{ asset('disilab/css/upvotejs.min.css')}}">
    <link rel="stylesheet" href="{{ asset('disilab/css/selectize.css')}}">
    <link rel="stylesheet" href="{{ asset('disilab/css/style.css')}}">
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
        <header class="header-area bg-white border-bottom border-bottom-gray">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2">
                <div class="logo-box">
                    <a href="{{url('/')}}" class="logo"><img src="{{ asset('disilab/images/logo9.jpeg')}}" alt="logo"></a>
                    <div class="user-action">
                        <div class="search-menu-toggle icon-element icon-element-xs shadow-sm mr-1" data-toggle="tooltip" data-placement="top" title="Search">
                            <i class="la la-search"></i>
                        </div>
                        <div class="off-canvas-menu-toggle icon-element icon-element-xs shadow-sm mr-1" data-toggle="tooltip" data-placement="top" title="Main menu">
                            <i class="la la-bars"></i>
                        </div>
                        <div class="user-off-canvas-menu-toggle icon-element icon-element-xs shadow-sm" data-toggle="tooltip" data-placement="top" title="User menu">
                            <i class="la la-user"></i>
                        </div>
                    </div>
                </div>
            </div><!-- end col-lg-2 -->
            <div class="col-lg-10">
                <div class="menu-wrapper border-left border-left-gray pl-4">
                    <nav class="menu-bar mr-auto">
                        <ul>
                            <li>
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li>
                                <a href="{{url('about')}}">About</a>
                            </li>
                        </ul><!-- end ul -->
                    </nav><!-- end main-menu -->
                    <div class="nav-right-button">
                        <ul class="user-action-wrap d-flex align-items-center">
                            <li class="dropdown user-dropdown">
                                <a class="nav-link dropdown-toggle dropdown--toggle pl-2" href="#" id="userMenuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="media media-card media--card shadow-none mb-0 rounded-0 align-items-center bg-transparent">
                                        <div class="media-img media-img-xs flex-shrink-0 rounded-full mr-2">
        <img src="{{asset('storage/app/'.Session('user_profile'))}}" alt="avatar" class="rounded-full">
                                        </div>
                                        <div class="media-body p-0 border-left-0">
                                            <h5 class="fs-14">{{Session('user_name')}}</h5>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown--menu dropdown-menu-right mt-3 keep-open" aria-labelledby="userMenuDropdown">
                                    <h6 class="dropdown-header">Hi,{{Session('user_name')}}</h6>
                                    <div class="dropdown-divider border-top-gray mb-0"></div>
                                    <div class="dropdown-item-list">
                                        <a class="dropdown-item" href="{{url('addscript')}}"><i class="la la-user mr-2"></i>Profile</a>
                                        <a class="dropdown-item" href="{{url('editprofile')}}"><i class="la la-gear mr-2"></i>Profile Settings</a>
                                        <a class="dropdown-item" href="{{url('logout')}}"><i class="la la-power-off mr-2"></i>Log out</a>
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
                <a href="{{url('/')}}">Home</a>
            </li>
            <li>
                <a href="#">About</a>
          
            </li>
        </ul>
      <!--   <div class="off-canvas-btn-box px-4 pt-5 text-center">
            <a href="login.html" class="btn theme-btn theme-btn-sm theme-btn-outline"><i class="la la-sign-in mr-1"></i> Login</a>
            <span class="fs-15 fw-medium d-inline-block mx-2">Or</span>
            <a href="signup.html" class="btn theme-btn theme-btn-sm"><i class="la la-plus mr-1"></i> Sign up</a>
        </div> -->
    </div><!-- end off-canvas-menu -->
    <div class="user-off-canvas-menu custom-scrollbar-styled">
        <div class="user-off-canvas-menu-close icon-element icon-element-sm shadow-sm" data-toggle="tooltip" data-placement="left" title="Close menu">
            <i class="la la-times"></i>
        </div><!-- end user-off-canvas-menu-close -->
        <ul class="nav nav-tabs generic-tabs generic--tabs pt-90px pl-4 shadow-sm" id="myTab2" role="tablist">
            <li class="nav-item"><div class="anim-bar"></div></li>
            <li class="nav-item">
                <a class="nav-link active" id="user-profile-menu-tab" data-toggle="tab" href="#user-profile-menu" role="tab" aria-controls="user-profile-menu" aria-selected="false">Profile</a>
            </li>
        </ul>
        <div class="tab-content pt-3" id="myTabContent2">
            <div class="tab-pane fade show active" id="user-profile-menu" role="tabpanel" aria-labelledby="user-profile-menu-tab">
                <div class="dropdown--menu shadow-none w-auto rounded-0">
                    <div class="dropdown-item-list">
                        <a class="dropdown-item" href="user-profile.html"><i class="la la-user mr-2"></i>Profile</a>
                        <a class="dropdown-item" href="notifications.html"><i class="la la-bell mr-2"></i>Notifications</a>
                        <a class="dropdown-item" href="referrals.html"><i class="la la-user-plus mr-2"></i>Referrals</a>
                        <a class="dropdown-item" href="{{url('editprofile')}}"><i class="la la-gear mr-2"></i>Settings</a>
                        <a class="dropdown-item" href="index.html"><i class="la la-power-off mr-2"></i>Log out</a>
                    </div>
                </div>
            </div><!-- end tab-pane -->
        </div>
    </div><!-- end user-off-canvas-menu -->
    <div class="body-overlay"></div>
</header><!-- end header-area -->
<!--======================================
        END HEADER AREA
======================================-->