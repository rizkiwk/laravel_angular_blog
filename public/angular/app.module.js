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

		.when('/signup', {
			templateUrl 	: './angular/templates/register-page.template.html',
			controller		: 'mainController'
		})

		.when('/dashboard', {
			templateUrl 	: './angular/templates/article-table.template.html',
			controller		: 'ArticleController'
		})

		.when('/article-add', {
			templateUrl 	: './angular/templates/article-form.template.html',
			controller		: 'ArticleController'
		})

	// $locationProvider.html5Mode(true);

}]);

blogApp.controller('mainController', function($scope, $http, $cookies, $window) {

	// Get data list article.
	$http({
		method	: 'GET',
		url 	: './api/article/',
		headers : {
	        'Content-Type': 'application/json',
	        'Accept': 'application/json'
	    }
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

blogApp.controller('UserController', function($scope, $http, $cookies, $window) {
	
	$scope.session_login = angular.fromJson($cookies.get('__login'));
	
	$scope.login = function($loginData) {
		$http({
			method 	: 'POST',
			url 	: './api/signin/',
			headers : {
		        'Content-Type': 'application/json',
		        'Accept': 'application/json'
		    },
		    data: $loginData
		})
		// .post('./api/signin/', $loginData)
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

	$scope.register = function($registerData) {
		$http({
			method 	: 'POST',
			url 	: './api/signup/',
			headers : {
		        'Content-Type': 'application/json',
		        'Accept': 'application/json'
		    },
		    data: $registerData
		})
		// .post('./api/signup/', $registerData)
		.then(
			function successCallback($response) {
				notifbox_elem = '<div class="alert alert-success alert-dismissible" role="alert">' +
            					'<button type="button" class="close" data-dismiss="alert" aria-label="Close">' + 
            					'<span aria-hidden="true">&times;</span></button>' + $response.data.message + '</div>';

            	$('#notifBox').html(notifbox_elem);
			},
			function errorCallback($response) {
				notifbox_elem = '<div class="alert alert-error alert-dismissible" role="alert">' +
            					'<button type="button" class="close" data-dismiss="alert" aria-label="Close">' + 
            					'<span aria-hidden="true">&times;</span></button>' + $response.data.message + '</div>';

            	$('#notifBox').html(notifbox_elem);
			}
		);
	};

	$scope.logout = function() {
		$cookies.remove('__login');
		$window.location.href = '/';
	};
	
});

blogApp.controller('ArticleController', function($scope, $http, $cookies, $window) {
	
	var articleController = this;

	articleController.__login = angular.fromJson($cookies.get('__login'));

	// Get data list article.
	$http({
		method	: 'GET',
		url 	: './api/article/?uid=' + articleController.__login.uid,
		headers	: {
	        'Content-Type': 'application/json',
	        'Accept': 'application/json'
	    }
	})
	.then(
		function successCallback($response) {
			$scope.getListArticle	= $response.data.data;
			// console.log('login-data : ' + articleItems);
		},
		function errorCallback($response) {
			// console.log($UUID);
			// $scope.articleItems = $response.data.data;
		}
	);

	// POST data list article.
	$scope.ajaxStoreArticle = function($requestArticle) {
		$requestArticle.description = tinyMCE.activeEditor.getContent();
		$requestArticle.uid 		= articleController.__login.uid;

		$http({
			method 	: 'POST',
			url 	: './api/article/store/',
			headers : {
		        'Content-Type': 'application/json',
		        'Accept': 'application/json'
		    },
		    data: $requestArticle
		})
		// .post('./api/article/store/', $requestArticle)
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
	};
	
});