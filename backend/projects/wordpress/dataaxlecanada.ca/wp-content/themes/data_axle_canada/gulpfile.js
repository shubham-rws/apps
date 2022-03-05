const { src, dest, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const prefix = require('gulp-autoprefixer');
const minify = require('gulp-clean-css');
const terser = require('gulp-terser');




function compileCss() {
return src('css/*.css')
//.pipe(sass())
.pipe(prefix('last 2 versions'))
.pipe(minify())
.pipe(dest('dist/css'))
}

function jsmin(){
	return src('js-dist/*.js')
	.pipe(terser())
	.pipe(dest('dist/js'));
}

exports.default = series(compileCss,jsmin)