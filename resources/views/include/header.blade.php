<!--
=========================================================
* Paper SCIMS - v1.0.0
=========================================================
* Copyright 2020 Point Web Tech (https://www.pointwebtech.com)
Coded by www.pointwebtech.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('adminassets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('adminassets/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title> SCIMS | @yield('title')</title>
    <meta name="_token" content="{{csrf_token()}}" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/paper-dashboard-2-pro" />
    <!--  Social tags      -->
    <meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 4 dashboard, bootstrap 4, css3 dashboard, bootstrap 4 admin, paper dashboard bootstrap 4 dashboard, frontend, responsive bootstrap 4 dashboard, paper design, paper dashboard bootstrap 4 dashboard">
    <meta name="description" content="Paper Dashboard PRO is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Paper Dashboard PRO by Creative Tim">
    <meta itemprop="description" content="Paper Dashboard PRO is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
    <meta itemprop="image" content="../../../s3.amazonaws.com/creativetim_bucket/products/84/opt_pd2p_thumbnail.jpg">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Paper Dashboard PRO by Creative Tim">
    <meta name="twitter:description" content="Paper Dashboard PRO is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="../../../s3.amazonaws.com/creativetim_bucket/products/84/opt_pd2p_thumbnail.jpg">
    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Paper Dashboard PRO by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://creativetimofficial.github.io/paper-dashboard-2-pro/examples/dashboard.html" />
    <meta property="og:image" content="../../../s3.amazonaws.com/creativetim_bucket/products/84/opt_pd2p_thumbnail.jpg" />
    <meta property="og:description" content="Paper Dashboard PRO is a beautiful Bootstrap 4 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you." />
    <meta property="og:site_name" content="Creative Tim" />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{asset('adminassets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('adminassets/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{asset('adminassets/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('adminassets/css/paper-dashboard.min1036.css?v=2.1.1')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('adminassets/demo/demo.css" rel="stylesheet')}}" />
    <link href="{{asset('css/custom.css')}}" rel="stylesheet')}}" />

 @yield('front_css')
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                '../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
    </script>
    <!-- End Google Tag Manager -->
</head>

<body class="">
<!-- Extra details for Live View on GitHub Pages -->
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="wrapper ">
    <div class="sidebar" data-color="default" data-active-color="danger">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color=" default | primary | info | success | warning | danger |"
      -->
        <div class="logo">
            <a href="{{url('/')}}" class="simple-text logo-mini">
                <div class="logo-image-small">
                    <img src="{{asset('adminassets/img/logo.gif')}}">
                </div>
                <!-- <p>CT</p> -->
            </a>
            <a href="{{url('/')}}" class="simple-text logo-normal">
                Creative Tim
                <!-- <div class="logo-image-big">
                  <img src="../assets/img/logo-big.png">
                </div> -->
            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="{{asset('adminassets/img/faces/ayo-ogunseinde-2.jpg')}}" />
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
              <span>
                Chet Faker
                <b class="caret"></b>
              </span>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#">
                                    <span class="sidebar-mini-icon">MP</span>
                                    <span class="sidebar-normal">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sidebar-mini-icon">EP</span>
                                    <span class="sidebar-normal">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sidebar-mini-icon">S</span>
                                    <span class="sidebar-normal">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <li class="active">
                    <a href="dashboard.html">
                        <i class="fa fa-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a data-toggle="collapse" href="#pagesExamples">
                        <i class="fa fa-cogs"></i>
                        <p>
                            Admin Pages <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="pagesExamples">
                        <ul class="nav">
                            <li>
                                <a href="{{url('school')}}">
                                    <span class="sidebar-mini-icon">ADM</span>
                                    <span class="sidebar-normal"> School </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('add-class')}}">
                                    <span class="sidebar-mini-icon">ADM</span>
                                    <span class="sidebar-normal"> Classes </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('class-section')}}">
                                    <span class="sidebar-mini-icon">ADM</span>
                                    <span class="sidebar-normal"> Class Section </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('add-subject')}}">
                                    <span class="sidebar-mini-icon">ADM</span>
                                    <span class="sidebar-normal"> Subjects </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sidebar-mini-icon">ADM</span>
                                    <span class="sidebar-normal"> Examination </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sidebar-mini-icon">ADM</span>
                                    <span class="sidebar-normal"> Syllabus </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('users')}}">
                                    <span class="sidebar-mini-icon">ADM</span>
                                    <span class="sidebar-normal"> Users </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('type')}}">
                                    <span class="sidebar-mini-icon">ADM</span>
                                    <span class="sidebar-normal"> Users Type </span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#componentsExamples">
                        <i class="fa fa-graduation-cap"></i>
                        <p>
                            Students <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="componentsExamples">
                        <ul class="nav">
                            <li>
                                <a href="{{url('students')}}">
                                    <span class="sidebar-mini-icon">VS</span>
                                    <span class="sidebar-normal"> View Students </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('admission')}}">
                                    <span class="sidebar-mini-icon">AS</span>
                                    <span class="sidebar-normal"> Admission </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sidebar-mini-icon">R</span>
                                    <span class="sidebar-normal"> Reports </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#formsExamples">
                        <i class="fa fa-users"></i>
                        <p>
                            Staff <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="formsExamples">
                        <ul class="nav">
                            <li>
                                <a href="{{url('staff')}}">
                                    <span class="sidebar-mini-icon">VS</span>
                                    <span class="sidebar-normal"> View Staff </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('appointment')}}">
                                    <span class="sidebar-mini-icon">AS</span>
                                    <span class="sidebar-normal"> Appointment </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sidebar-mini-icon">R</span>
                                    <span class="sidebar-normal"> Reports </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#tablesExamples">
                        <i class="fa fa-clipboard"></i>
                        <p>
                            Examination  <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="tablesExamples">
                        <ul class="nav">
                            <li>
                                <a href="#">
                                    <span class="sidebar-mini-icon">RT</span>
                                    <span class="sidebar-normal"> Regular Tables </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sidebar-mini-icon">ET</span>
                                    <span class="sidebar-normal"> Extended Tables </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sidebar-mini-icon">DT</span>
                                    <span class="sidebar-normal"> DataTables.net </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#Accounts">
                        <i class="fa fa-money"></i>
                        <p>
                            Accounts <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="Accounts">
                        <ul class="nav">
                            <li>
                                <a href="maps/google.html">
                                    <span class="sidebar-mini-icon">GM</span>
                                    <span class="sidebar-normal"> Google Maps </span>
                                </a>
                            </li>
                            <li>
                                <a href="maps/fullscreen.html">
                                    <span class="sidebar-mini-icon">FSM</span>
                                    <span class="sidebar-normal"> Full Screen Map </span>
                                </a>
                            </li>
                            <li>
                                <a href="maps/vector.html">
                                    <span class="sidebar-mini-icon">VM</span>
                                    <span class="sidebar-normal"> Vector Map </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#mapsExamples1">
                        <i class="fa fa-book"></i>
                        <p>
                            Library <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="mapsExamples1">
                        <ul class="nav">
                            <li>
                                <a href="maps/google.html">
                                    <span class="sidebar-mini-icon">GM</span>
                                    <span class="sidebar-normal"> Google Maps </span>
                                </a>
                            </li>
                            <li>
                                <a href="maps/fullscreen.html">
                                    <span class="sidebar-mini-icon">FSM</span>
                                    <span class="sidebar-normal"> Full Screen Map </span>
                                </a>
                            </li>
                            <li>
                                <a href="maps/vector.html">
                                    <span class="sidebar-mini-icon">VM</span>
                                    <span class="sidebar-normal"> Vector Map </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#Transport">
                        <i class="fa fa-bus"></i>
                        <p>
                            Transport <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="Transport">
                        <ul class="nav">
                            <li>
                                <a href="maps/google.html">
                                    <span class="sidebar-mini-icon">GM</span>
                                    <span class="sidebar-normal"> Google Maps </span>
                                </a>
                            </li>
                            <li>
                                <a href="maps/fullscreen.html">
                                    <span class="sidebar-mini-icon">FSM</span>
                                    <span class="sidebar-normal"> Full Screen Map </span>
                                </a>
                            </li>
                            <li>
                                <a href="maps/vector.html">
                                    <span class="sidebar-mini-icon">VM</span>
                                    <span class="sidebar-normal"> Vector Map </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#Hostel">
                        <i class="fa fa-building-o"></i>
                        <p>
                            Hostel <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="Hostel">
                        <ul class="nav">
                            <li>
                                <a href="maps/google.html">
                                    <span class="sidebar-mini-icon">GM</span>
                                    <span class="sidebar-normal"> Google Maps </span>
                                </a>
                            </li>
                            <li>
                                <a href="maps/fullscreen.html">
                                    <span class="sidebar-mini-icon">FSM</span>
                                    <span class="sidebar-normal"> Full Screen Map </span>
                                </a>
                            </li>
                            <li>
                                <a href="maps/vector.html">
                                    <span class="sidebar-mini-icon">VM</span>
                                    <span class="sidebar-normal"> Vector Map </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="../examples/calendar.html.html">
                        <i class="fa fa-calendar"></i>
                        <p>Events</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-icon btn-round">
                            <i class="fa fa-lg fa-angle-right text-center visible-on-sidebar-mini"></i>
                            <i class="fa fa-lg fa-angle-left text-center visible-on-sidebar-regular"></i>
                        </button>
                    </div>
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="javascript:;">School Information Management System</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <form>
                        <div class="input-group no-border">
                            <input type="text" value="" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fa fa-search"></i>
                                </div>
                            </div>
                        </div>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link btn-magnify" href="javascript:;">
                                <i class="fa fa-circle-o-notch"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Stats</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item btn-rotate dropdown">
                            <a class="nav-link dropdown-toggle" href="http://example.com/" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell-o"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Some Actions</span>
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-rotate" href="{{ url('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i>
                            </a>

                            <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                            {{--<a class="nav-link btn-rotate" href="javascri">
                                <i class="fa fa-cog"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Account</span>
                                </p>
                            </a>--}}
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
