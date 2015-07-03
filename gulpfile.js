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
    mix.scripts([
            'jquery/dist/jquery.min.js',
            'bootstrap/dist/js/bootstrap.min.js',
        ], 'public/js/all.js', 'resources/js/bower_components')
        .styles([
            'bootstrap/dist/css/bootstrap.min.css',
            'metisMenu/dist/metisMenu.min.css',
            'font-awesome/css/font-awesome.min.css',
            'startbootstrap-sb-admin-2/dist/css/timeline.css',
            'startbootstrap-sb-admin-2/dist/css/sb-admin-2.css',
        ],'public/css/admin.css', 'resources/js/bower_components')
        .scripts([
            'jquery/dist/jquery.min.js',
            'bootstrap/dist/js/bootstrap.min.js',
            'metisMenu/dist/metisMenu.min.js',
            'raphael/raphael-min.js',
            'morrisjs/morris.min.js',
            'startbootstrap-sb-admin-2/dist/js/sb-admin-2.js'
        ], 'public/js/admin.js', 'resources/js/bower_components')
        .copy('resources/js/bower_components/font-awesome/fonts', 'public/fonts')
        .scripts([
            'frontend/js/jquery-1.10.2.min.js',
            'frontend/js/jquery.easing.min.js',
            'frontend/js/owl.carousel.min.js',
            'frontend/js/wow.min.js',
            'frontend/js/masonry.pkgd.min.js',
            'frontend/js/imagesloaded.js',
            'frontend/js/classie.js',
            'frontend/js/animonscroll.js',
            'frontend/js/jquery.bxslider.min.js',
            'frontend/js/jquery.colorbox-min.js'
        ], 'public/js/frontend.js', 'resources')
        .styles([
            'colorbox.css',
            'tuelinh.css'
        ], 'public/css/frontend.css', 'resources/frontend/css');
});
