var gulp = require('gulp'),
	inline = require('gulp-inline'),
	minifyCSS = require('gulp-minify-css'),
	uglify = require('gulp-uglify'),
	sass = require('gulp-sass');

gulp.task('default', ['watch']);

gulp.task('inline', function() {
	gulp.src(['*.html', '*.php'])
		.pipe(inline(
		{
			js: uglify,
			css: minifyCSS
		}))
		.pipe(gulp.dest('dist'))
});

gulp.task('sass', function() {
	gulp.src('assets/sass/**/*.scss')
		.pipe(sass())
		.pipe(gulp.dest('assets/css'));
});

gulp.task('watch', function() {
	gulp.watch(['*.html', '*.php', 'assets/**/*.css'], ['sass', 'inline']);
});