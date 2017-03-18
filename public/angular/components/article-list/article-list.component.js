var ArticleList 	= angular.module('ArticleList');

ArticleList.component('ArticleList', {

	templateUrl : './angular/components/article-list/article-list.template.html',

	controller : function ArticleController() {
		this.articles = [
			{
				title: 'Article 1',
				desc: 'lorem ipsum bla bla bla'
			},
			{
				title: 'Article 2',
				desc: 'lorem ipsum bla bla bla'
			},
			{
				title: 'Article 3',
				desc: 'lorem ipsum bla bla bla'
			}
		];
	}

});