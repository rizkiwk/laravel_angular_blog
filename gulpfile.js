var elixir = require('laravel-elixir');
    
elixir(function(mix) {
    // mix.less('app.less');

    // mix.scripts(
    // 	[
    // 		'angular/app.module.js', 'angular/app.config.js', 'angular/controllers/MainController.js'
    // 	],
    // 	'public/js/app.module.js'
    // );

    // mix.scriptsIn('resources/assets/js/libraries');
    mix.scriptsIn('resources/assets/js/angular/modules');
});