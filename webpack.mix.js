const mix = require('laravel-mix');
// const path = require("path");
// const { VueLoaderPlugin } = require("vue-loader");


// mix.js('resources/js/app.js', 'public/js/playground/app.app.js').vue()
mix.js('resources/js/app.js', 'public/js').vue()
mix.css('resources/css/app.css', 'public/css').vue()


mix.options({
    processCssUrls: false
})
.webpackConfig({
    module: {
        rules: [{
            test: /\.pug$/,
            loader: 'pug-plain-loader'
        }],
    },
});


