var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss')
        .copy('node_modules/sweetalert/dist/sweetalert.min.js', 'resources/assets/js/sweetalert.min.js')
        .copy('node_modules/sweetalert/dist/sweetalert.css', 'resources/assets/css/sweetalert.css')
        .scripts([
            'resources/assets/js/sweetalert.min.js'
        ], './public/js/libs.js')
        .styles([
            'resources/assets/css/sweetalert.css'
        ], './public/css/libs.css');
});
