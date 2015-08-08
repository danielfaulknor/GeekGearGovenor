var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.styles([
      'vendor/bootstrap-tagsinput.css',
      'vendor/typeaheadjs.css',
      'typeahead.css',
    ]);

    mix.scripts([
      'vendor/typeahead.bundle.js',
      'vendor/bootstrap-tagsinput.js',
   ]);

     mix.version(['css/all.css', 'js/all.js']);
});
