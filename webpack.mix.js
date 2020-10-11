const mix = require('laravel-mix')
const path =require('path')

const tailwindcss = require('tailwindcss')

/**
 *  Mix Asset Manager
 * ------------------
 * Laravel Mix is a wrapper around webpack for easy hook int into
 * the webpack build steps/life cycle
 */

mix.js('resources/assets/js/main.js', 'public/js')
	.sass('resources/assets/sass/app.scss', 'public/css')
	.options({
		processCssUrls: false,
		postCss: [ tailwindcss('./tailwind.config.js')]
	})
	.styles('./resources/assets/css/welcome.css', './public/css/welcome.css')