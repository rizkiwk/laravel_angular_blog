var blogApp 	= angular.module('blogApp', []);

blogApp.controller('ArticleController', function($scope, $http) {
	
	$scope.articles 	= [
		title 	: "Judul Article",
		desc 	: "lorem ipsum bla bla bal."
	];

});