var blogApp 	= angular.module('blogApp', ['ngRoute']);

blogApp.config(['$locationProvider', '$routeProvider', function config($locationProvider, $routeProvider) {

	// $locationProvider.hashPrefix('!');

	$routeProvider

		.when('/', {
			templateUrl 	: './angular/templates/main-page.template.html',
			controller 		: 'mainController'
		})

		.when('/signup', {
			templateUrl 	: './angular/templates/article-table.template.html',
			controller		: 'mainController'
		})

		.when('/signin', {
			templateUrl 	: '',
			controller		: 'mainController'
		})

		.when('/logout', {
			templateUrl 	: '',
			controller		: 'mainController'
		})

		.when('/dashboard', {
			templateUrl 	: './angular/templates/article-table.template.html',
			controller		: 'dashboardController'
		})

		.when('/article-add', {
			templateUrl 	: './angular/templates/article-form.template.html',
			controller		: 'articleFormController'
		})

}]);

blogApp.controller('mainController', function($scope, $http) {

	// Get data list article.
	$http({
		method	: 'GET',
		url 	: './api/article/'
	})
	.then(
		function successCallback($response) {
			// console.log($response.data.data);
			$scope.articleItems = $response.data.data;
		},
		function errorCallback($response) {
			console.log($response.data.message);
			// $scope.articleItems = $response.data.data;
		}
	);

});

blogApp.controller('dashboardController', function($scope, $http) {
	// Get data list article.
	$http({
		method	: 'GET',
		url 	: './api/article/?uid=1'
	})
	.then(
		function successCallback($response) {
			// console.log($response.data.data);
			$scope.articleItems = $response.data.data;
		},
		function errorCallback($response) {
			console.log($response.data.message);
			// $scope.articleItems = $response.data.data;
		}
	);
});

blogApp.controller('articleFormController', function($scope, $http) {
	
	// POST data list article.
	$scope.ajaxStoreArticle = function($requestArticle) {
		$requestArticle.description = tinyMCE.activeEditor.getContent();
		$requestArticle.uid 		= 1;

		$http
		.post('./api/article/store/', $requestArticle)
		.then(
			function successCallback($response) {
				console.log($response.data.data);
				// $scope.articleItems = $response.data.data;
			},
			function errorCallback($response) {
				console.log($response.data.message);
				// $scope.articleItems = $response.data.data;
			}
		);
	}
	
});