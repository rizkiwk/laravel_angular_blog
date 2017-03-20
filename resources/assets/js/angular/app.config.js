angular.module('blogApp')

.config(['$routeProvider', '$locationProvider', function config($routeProvider, $locationProvider) {

	// $locationProvider.hashPrefix('');

	$routeProvider

		.when('/', {
			templateUrl 	: './angular/templates/main-page.template.html',
			controller 		: 'mainController'
		})

		

	$locationProvider.html5Mode(true);

}]);