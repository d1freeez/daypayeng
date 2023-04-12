const mix = require('laravel-mix')

mix.js('resources/js/app.js', 'public/js')
    .version()
    .vue({ version: 2 })
    .sass('resources/sass/app.scss', 'public/css')
