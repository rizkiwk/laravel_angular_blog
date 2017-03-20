var blogApp 	= angular.module('blogApp', ['ngRoute', 'ngCookies']);

blogApp.config(['$routeProvider', '$locationProvider', function config($routeProvider, $locationProvider) {

	// $locationProvider.hashPrefix('');

	$routeProvider

		.when('/', {
			templateUrl 	: './angular/templates/main-page.template.html',
			controller 		: 'mainController'
		})

		.when('/signin', {
			templateUrl 	: './angular/templates/login-page.template.html',
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

	// $locationProvider.html5Mode(true);

}]);

blogApp.controller('mainController', function($scope, $http, $cookies, $window) {

	$scope.session_login = angular.fromJson($cookies.get('__login'));

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

	$scope.login = function($loginData) {
		$http
		.post('./api/signin/', $loginData)
		.then(
			function successCallback($response) {
				$login_data = $response.data.data;
				$cookies.put('__login', angular.toJson($login_data, true));
				console.log('login-data : ' + $login_data.uid);

				$window.location.href = '/';
			},
			function errorCallback($response) {
				console.log('login-data : ' + $response.data.message);
			}
		);
	};

});

blogApp.controller('dashboardController', function($scope, $http, $cookies, $window) {

	var controller = this;

	controller.__login = angular.fromJson($cookies.get('__login'));

	$scope.session_login = angular.fromJson($cookies.get('__login'));

	// Get data list article.
	$http({
		method	: 'GET',
		url 	: './api/article/?uid=' + controller.__login.uid
	})
	.then(
		function successCallback($response) {
			$scope.articleItems = $response.data.data;
			// console.log('login-data : ' + articleItems);
		},
		function errorCallback($response) {
			// console.log($UUID);
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

				notifbox_elem = '<div class="alert alert-success alert-dismissible" role="alert">' +
            					'<button type="button" class="close" data-dismiss="alert" aria-label="Close">' + 
            					'<span aria-hidden="true">&times;</span></button>' + $response.data.message + '</div>';

            	$('#notifBox').html(notifbox_elem);
			},
			function errorCallback($response) {
				console.log($response.data.message);

				notifbox_elem = '<div class="alert alert-error alert-dismissible" role="alert">' +
            					'<button type="button" class="close" data-dismiss="alert" aria-label="Close">' + 
            					'<span aria-hidden="true">&times;</span></button>' + $response.data.message + '</div>';

            	$('#notifBox').html(notifbox_elem);
			}
		);
	}
	
});