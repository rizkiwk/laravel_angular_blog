<!DOCTYPE html>
<html ng-app="blogApp" lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="./bower/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">

        <!-- Script -->
        <script src="./bower/jquery/dist/jquery.min.js" type="text/javascript"></script>
        <script src="./bower/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="./bower/angular/angular.min.js" type="text/javascript"></script>
        <script src="./bower/angular-route/angular-route.min.js" type="text/javascript"></script>
        <script src="./angular/app.module.js" type="text/javascript"></script>
        <!-- <script src="./angular/app.config.js" type="text/javascript"></script> -->

        <!-- <script src="./angular/components/pages/main-page.module.js" type="text/javascript"></script> -->
        <!-- <script src="./angular/components/pages/main-page.component.js" type="text/javascript"></script> -->
       
    </head>
    <body>
        <div class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Bloggy</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" data-toggle="modal" data-target="#signup_modal">Sign up</a>
                            <!-- <button type="button" class="btn btn-link" data-toggle="modal" data-target="#signup_modal">Sign up</button> -->
                        </li>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#login_modal">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div ng-view></div>

        <!-- <script src="./angular/app.module.js" type="text/javascript"></script> -->
    </body>
</html>
