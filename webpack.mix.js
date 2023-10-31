const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/validations/form-login.js', 'public/js/validations')
    .js('resources/js/validations/form-forgot-password.js', 'public/js/validations')
    .js('resources/js/validations/form-user.js', 'public/js/validations')
    .js('resources/js/firebase-messaging.js', 'public/js')
    .css('resources/css/custom.css', 'public/css')
    .postCss('resources/css/app.css', 'public/css', [
        require("tailwindcss"),
    ])
    .version();