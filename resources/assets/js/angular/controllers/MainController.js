angular.module('blogApp')

.controller('MainController', function($scope, $http) {

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
				console.log('login-data : ' + $response.data.data);
			},
			function errorCallback($response) {
				console.log('login-data : ' + $response.data.message);
			}
		);
	};

});