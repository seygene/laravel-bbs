const elixir = require('laravel-elixir');
require('laravel-elixir-webpack-official');
require('laravel-elixir-vue-2');

elixir(mix => {
    mix.sass('app.scss');
    mix.webpack('app.js');
    mix.scripts([
        '../../../node_modules/highlight.js/lib/highlight.js',
        '../../../public/js/app.js',
        '../../../node_modules/select2/dist/js/select2.js'
    ], 'public/js/app.js');

    mix.version([
        'css/app.css',
        'js/app.js'
    ]);
    mix.copy('node_modules/font-awesome/fonts','public/build/fonts');
    //mix.browserSync({proxy: 'localhost:9998'});
});
