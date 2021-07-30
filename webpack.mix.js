const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js/playground/app.app.js').vue()

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
