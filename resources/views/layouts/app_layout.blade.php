<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 4 Dashboard Sidebar Menu Example</title>


    <!-- Style CSS -->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Demo CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="@sweetalert2/themes/dark/dark.css">
    <script src="sweetalert2/dist/sweetalert2.min.js"></script>

    <style>
        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting:before,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_asc:before,
        table.dataTable thead .sorting_asc_disabled:after,
        table.dataTable thead .sorting_asc_disabled:before,
        table.dataTable thead .sorting_desc:after,
        table.dataTable thead .sorting_desc:before,
        table.dataTable thead .sorting_desc_disabled:after,
        table.dataTable thead .sorting_desc_disabled:before {
            bottom: .5em;
        }
    </style>

</head>



<body>
{{--<header class="intro">--}}
{{--    <h1> Bootstrap 4 Dashboard Sidebar Menu Example </h1>--}}
{{--    <p> A responsive sidebar menu template using Bootstrap 4.</p>--}}

{{--    <div class="action">--}}
{{--        <a href="https://www.codehim.com/bootstrap/bootstrap-4-sidebar-menu-responsive-template/" title="Back to download and tutorial page" class="btn back">Back to Tutorial</a>--}}

{{--    </div>--}}

{{--</header>--}}

<div class="row">


    <div class="col-md-2">
        <article>
{{--            <p>This page demo the Bootstrap 4 responsive dahboard sidebar menu.</p>--}}


            <!-- Sidebar Menu HTML -->
            <div class="page-wrapper chiller-theme toggled">
                <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
                    <i class="fas fa-bars"></i>
                </a>
                <nav id="sidebar" class="sidebar-wrapper">
                    <div class="sidebar-content">
                        <div class="sidebar-brand">
                            <a href="#"></a>
                            <div id="close-sidebar">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                        <div class="sidebar-header">
                            <div class="user-pic">
                                <img style="height: 50px" class="img-responsive img-rounded"
                                     src="{{ asset('images/user.png') }}"
                                     alt="User picture">
                            </div>
                            <div class="user-info">
      <span class="user-name">{{ Auth::user()->name }}
      </span>
                                <span class="user-role">Administrator</span>
                            </div>
                        </div>


                        <div class="sidebar-menu">
                            <ul>
                                <li>
                                    <a href="/home">
                                        <i class="fa fa-calendar"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/Client">
                                        <i class="fa fa-calendar"></i>
                                        <span>Client</span>
                                    </a>
                                </li>
                                <li class="sidebar-dropdown">
                                    <a href="#">
                                        <i class="fa fa-chart-line"></i>
                                        <span>Menu Items</span>
                                    </a>
                                    <div class="sidebar-submenu">
                                        <ul>
                                            <li>
                                                <a href="#">Cake</a>
                                            </li>
                                            <li>
                                                <a href="#">Short Eats</a>
                                            </li>
                                            <li>
                                                <a href="#">Rice</a>
                                            </li>
                                            <li>
                                                <a href="#">Pizza</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-calendar"></i>
                                        <span>Tables</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="fa fa-calendar"></i>
                                        <span>Reviews</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-calendar"></i>
                                        <span>Orders</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-calendar"></i>
                                        <span>Live Orders</span>
                                    </a>
                                </li>


                            </ul>
                        </div>
                        <!-- sidebar-menu  -->
                    </div>

                </nav>
            </div>


        </article>
    </div>
    <div class="col-md-10" id="app" >
        <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
                <div>

{{--                    <article>--}}
        @yield('content')

{{--                    </article>--}}
                </div>
    </div>
</div>




<footer class="credit">Author: Puskar Adhikari - Distributed By: <a title="Awesome web design code & scripts" href="https://www.codehim.com?source=demo-page" target="_blank">CodeHim</a></footer>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    jQuery(function ($) {

        $(".sidebar-dropdown > a").click(function() {
            $(".sidebar-submenu").slideUp(200);
            if (
                $(this)
                    .parent()
                    .hasClass("active")
            ) {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                    .parent()
                    .removeClass("active");
            } else {
                $(".sidebar-dropdown").removeClass("active");
                $(this)
                    .next(".sidebar-submenu")
                    .slideDown(200);
                $(this)
                    .parent()
                    .addClass("active");
            }
        });

        $("#close-sidebar").click(function() {
            $(".page-wrapper").removeClass("toggled");
        });
        $("#show-sidebar").click(function() {
            $(".page-wrapper").addClass("toggled");
        });




    });

</script>

<script>
    $(document).ready(function () {
        $('#selectedColumn').DataTable({
            "aaSorting": [],
            columnDefs: [{
                orderable: false,
                targets: 3
            }]
        });
        $('.dataTables_length').addClass('bs-select');
    });
</script>


@yield('footer_content')

</body>


</html>
