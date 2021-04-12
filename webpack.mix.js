const mix = require('laravel-mix');
const sass = require('node-sass');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

mix
    .js('resources/js/dashboard/app.js', 'public/build/js/dashboard/dashboard.js')
    .js('resources/js/widget/app.js', 'public/build/js/widget/widget.js')
    .vue()
    .sass('resources/sass/dashboard/app.scss', 'public/build/css/dashboard/dashboard.css', { implementation: sass })
    .sass('resources/sass/widget/app.scss', 'public/build/css/widget/widget.css', { implementation: sass })
    .options({
        processCssUrls: false
    });
