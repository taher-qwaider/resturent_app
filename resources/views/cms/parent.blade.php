<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>App | @yield('title')</title>
    <!-- Favicon icon -->
{{--    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">--}}
    <link rel="stylesheet" href="{{ asset('cms/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    <link href="{{ asset('cms/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('cms/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('cms/vendor/toastr/css/toastr.min.css') }}">
@yield('styles')

</head>

<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--*******************
    Preloader end
********************-->


<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    <div class="nav-header">
        <a href="index.html" class="brand-logo">
            <img class="logo-abbr" src="{{ asset('cms/images/logo.png') }}" alt="">
            <img class="logo-compact" src="{{ asset('cms/images/logo-text.png') }}" alt="">
            <img class="brand-title" src="{{ asset('cms/images/logo-text.png') }}" alt="">
        </a>

        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">
                        <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                            <div class="dropdown-menu p-0 m-0">
                                <form>
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                </form>
                            </div>
                        </div>
                    </div>

                    <ul class="navbar-nav header-right">
                        <li class="nav-item dropdown notification_dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                <i class="mdi mdi-bell"></i>
                                <div class="pulse-css"></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <ul class="list-unstyled">
                                    <li class="media dropdown-item">
                                        <span class="success"><i class="ti-user"></i></span>
                                        <div class="media-body">
                                            <a href="#">
                                                <p><strong>Martin</strong> has added a <strong>customer</strong> Successfully
                                                </p>
                                            </a>
                                        </div>
                                        <span class="notify-time">3:20 am</span>
                                    </li>
                                    <li class="media dropdown-item">
                                        <span class="primary"><i class="ti-shopping-cart"></i></span>
                                        <div class="media-body">
                                            <a href="#">
                                                <p><strong>Jennifer</strong> purchased Light Dashboard 2.0.</p>
                                            </a>
                                        </div>
                                        <span class="notify-time">3:20 am</span>
                                    </li>
                                    <li class="media dropdown-item">
                                        <span class="danger"><i class="ti-bookmark"></i></span>
                                        <div class="media-body">
                                            <a href="#">
                                                <p><strong>Robin</strong> marked a <strong>ticket</strong> as unsolved.
                                                </p>
                                            </a>
                                        </div>
                                        <span class="notify-time">3:20 am</span>
                                    </li>
                                    <li class="media dropdown-item">
                                        <span class="primary"><i class="ti-heart"></i></span>
                                        <div class="media-body">
                                            <a href="#">
                                                <p><strong>David</strong> purchased Light Dashboard 1.0.</p>
                                            </a>
                                        </div>
                                        <span class="notify-time">3:20 am</span>
                                    </li>
                                    <li class="media dropdown-item">
                                        <span class="success"><i class="ti-image"></i></span>
                                        <div class="media-body">
                                            <a href="#">
                                                <p><strong> James.</strong> has added a<strong>customer</strong> Successfully
                                                </p>
                                            </a>
                                        </div>
                                        <span class="notify-time">3:20 am</span>
                                    </li>
                                </ul>
                                <a class="all-notification" href="#">See all notifications <i
                                        class="ti-arrow-right"></i></a>
                            </div>
                        </li>
                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                <i class="mdi mdi-account"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="./app-profile.html" class="dropdown-item">
                                    <i class="icon-user"></i>
                                    <span class="ml-2">Profile </span>
                                </a>
                                <a href="./email-inbox.html" class="dropdown-item">
                                    <i class="icon-envelope-open"></i>
                                    <span class="ml-2">Inbox </span>
                                </a>
                                <a href="./page-login.html" class="dropdown-item">
                                    <i class="icon-key"></i>
                                    <span class="ml-2">Logout </span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    <div class="quixnav">
        <div class="quixnav-scroll">
            <ul class="metismenu" id="menu">
                <li class="nav-label first">Main Menu</li>
                <li><a class="has-arrow" href="#" aria-expanded="false"><i
                            class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    </ul>
                </li>
                <li class="nav-label">Content Management</li>
                <li><a class="has-arrow" href="#" aria-expanded="false"><i
                            class="icon icon-app-store"></i><span class="nav-text">Categories</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('categories.index') }}">Index</a></li>
                        <li><a href="{{ route('categories.create') }}">Create</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <i class="icon icon-coffee"></i><span class="nav-text">Meals</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('meals.index') }}">Index</a></li>
                        <li><a href="{{ route('meals.create') }}">Create</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('meal.spacial') }}" aria-expanded="false">
                        <i class="icon icon-globe-2"></i>
                        <span class="nav-text">Spacial</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <i class="icon icon-coffee"></i><span class="nav-text">Events</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('events.index') }}">Index</a></li>
                        <li><a href="{{ route('events.create') }}">Create</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <i class="icon icon-coffee"></i><span class="nav-text">Reservations</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('reservations.index') }}">Index</a></li>
                        <li><a href="{{ route('reservations.create') }}">Create</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <i class="icon icon-coffee"></i><span class="nav-text">Reviews</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('reviews.index') }}">Index</a></li>
                        <li><a href="{{ route('reviews.create') }}">Create</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('album.edit') }}" aria-expanded="false">
                        <i class="icon icon-globe-2"></i>
                        <span class="nav-text">Album</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <i class="icon icon-coffee"></i><span class="nav-text">Chefs</span></a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('chefs.index') }}">Index</a></li>
                        <li><a href="{{ route('chefs.create') }}">Create</a></li>
                    </ul>
                </li>

            </ul>
        </div>


    </div>
    <!--**********************************
        Sidebar end
    ***********************************-->

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        @yield('main-content')
    </div>
    <!--**********************************
        Content body end
    ***********************************-->


    <!--**********************************
        Footer start
    ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
            <p>Distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a></p>
        </div>
    </div>
    <!--**********************************
        Footer end
    ***********************************-->

    <!--**********************************
       Support ticket button start
    ***********************************-->

    <!--**********************************
       Support ticket button end
    ***********************************-->


</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{ asset('cms/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('cms/js/quixnav-init.js') }}"></script>
<script src="{{ asset('cms/js/custom.min.js') }}"></script>


<!-- Vectormap -->
<script src="{{ asset('cms/vendor/raphael/raphael.min.js') }}"></script>
{{--<script src="{{ asset('cms/vendor/morris/morris.min.js') }}"></script>--}}


<script src="{{ asset('cms/vendor/circle-progress/circle-progress.min.js') }}"></script>
<script src="{{ asset('cms/vendor/chart.js/Chart.bundle.min.js') }}"></script>

<script src="{{ asset('cms/vendor/gaugeJS/dist/gauge.min.js') }}"></script>

<!--  flot-chart js -->
<script src="{{ asset('cms/vendor/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('cms/vendor/flot/jquery.flot.resize.js') }}"></script>

<!-- Owl Carousel -->
<script src="{{ asset('cms/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

<!-- Counter Up -->
<script src="{{ asset('cms/vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('cms/vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>
<script src="{{ asset('cms/vendor/jquery.counterup/jquery.counterup.min.js') }}"></script>
{{--<script src="https://unpkg.com/axios/dist/axios.min.js"></script>--}}
<script src="{{ asset('cms/vendor/toastr/js/toastr.min.js') }}"></script>
<script src="{{ asset('js/axios.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@yield('scripts')

{{--<script src="{{ asset('cms/js/dashboard/dashboard-1.js') }}"></script>--}}

</body>

</html>
