// webpack.mix.js

let mix = require('laravel-mix');
mix.sass('resources/sass/main.scss', 'public/css/style.css')
    .sass('resources/sass/categories.scss', 'public/css/style.css')
    .sass('resources/sass/products.scss', 'public/css/style.css');
