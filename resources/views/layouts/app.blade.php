<!DOCTYPE html>
<html ng-app="blogApp" lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <base href="/">

    <title>{{ config('app.name', 'Bloggy') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="./bower/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Script -->
    <script src="./bower/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="./bower/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="./bower/angular/angular.min.js" type="text/javascript"></script>
    <script src="./bower/angular-route/angular-route.min.js" type="text/javascript"></script>
    <script src="./bower/angular-cookies/angular-cookies.min.js" type="text/javascript"></script>
    <script src="./angular/app.module.js" type="text/javascript"></script>
    <!-- <script src="./js/blog-app.js" type="text/javascript"></script> -->
    <!-- <script src="./angular/app.config.js" type="text/javascript"></script> -->

    <!-- <script src="./angular/components/pages/main-page.module.js" type="text/javascript"></script> -->
    <!-- <script src="./angular/components/pages/main-page.component.js" type="text/javascript"></script> -->

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app" >
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}" target="_self">
                        {{ config('app.name', 'Bloggy') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="./#!/signin">Login</a></li>
                            <!-- <li><a href="{{ route('login') }}" target="_self">Login</a></li> -->
                            <li><a href="{{ route('register') }}" target="_self">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="./#!/dashboard">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <div ng-view></div>
    </div>
</body>
</html>
