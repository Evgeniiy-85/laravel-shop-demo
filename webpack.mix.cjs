// webpack.mix.js

let mix = require('laravel-mix');

mix
    // .js('resources/js/cart.js', 'js/scripts.js')
    // .js('resources/js/favorites.js', 'js/scripts.js')
    // .js('resources/js/main.js', 'js/scripts.js')

    .sass('resources/sass/main.scss', 'css/style.css')
    .sass('resources/sass/header.scss', 'css/style.css')
    .sass('resources/sass/categories.scss', 'css/style.css')
    .sass('resources/sass/products.scss', 'css/style.css')
    .sass('resources/sass/product-card.scss', 'css/style.css')
    .sass('resources/sass/product-reviews.scss', 'css/style.css')
    .sass('resources/sass/cart.scss', 'css/style.css')
    .sass('resources/sass/cart-modal.scss', 'css/style.css');
