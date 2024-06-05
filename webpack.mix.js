const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .vue()  // This line enables Vue support
   .sass('resources/sass/app.scss', 'public/css');
