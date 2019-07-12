const path = require('path');
const mix = require('laravel-mix');
const webpack = require('webpack');
const tailwindcss = require('tailwindcss');
require('laravel-mix-purgecss');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.options({
  uglify: {
    uglifyOptions: {
      compress: {
        drop_console: true,
      },
    },
  },
})
  .setPublicPath('public')
  .sass('resources/sass/app.scss', 'public/laravel-dashboard-template.css')
  .options({
    processCssUrls: false,
    postCss: [tailwindcss('./tailwind.config.js')],
  })
  .version();
  // .purgeCss();