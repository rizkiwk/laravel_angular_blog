var blogApp   = angular.module('blogApp');

blogApp.config(['$locationProvider', '$routeProvider', function config($locationProvider, $routeProvider) {
    $locationProvider.hashPrefix('!');

    $routeProvider
      .when('/', {
        templateUrl: './angular/components/pages/main-page.template.html'
      })

      .when('/signup', {
        templateUrl: './angular/components/pages/signup-page.template.html'
      });
  }
]);