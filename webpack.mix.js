let mix = require('laravel-mix');

mix.setPublicPath('dist')
    .postCss('resources/css/field.css', 'css', [require('tailwindcss')])
    .js('resources/js/field.js', 'js')
    .vue();
