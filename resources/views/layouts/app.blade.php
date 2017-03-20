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
        <div ng-view></div>
    </div>
</body>
</html>
