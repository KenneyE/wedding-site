var gulp = require('gulp'),
	inline = require('gulp-inline'),
	minifyCSS = require('gulp-minify-css'),
	uglify = require('gulp-uglify'),
	sass = require('gulp-sass');

gulp.task('default', ['build', 'watch']);

gulp.task('build', ['inline', 'copy']);

gulp.task('inline', ['sass'], function() {
	return gulp.src(['lib/*.html', 'lib/*.php'])
		.pipe(inline(
		{
			js: uglify,
			css: minifyCSS,
            disabledTypes: ['img']
		}))
		.pipe(gulp.dest('docs'));
});

gulp.task('copy', function() {
	gulp.src('lib/.htaccess')
		.pipe(gulp.dest('docs'));
	gulp.src('lib/robots.txt')
		.pipe(gulp.dest('docs'));
	gulp.src('lib/images/**/*')
		.pipe(gulp.dest('docs/images'));
	gulp.src('lib/assets/fonts/*')
		.pipe(gulp.dest('docs/assets/fonts'));
	gulp.src('lib/assets/css/images/*')
		.pipe(gulp.dest('docs/assets/css/images'));	
});

gulp.task('sass', function() {
	return gulp.src('lib/assets/sass/**/*.scss')
		.pipe(sass())
		.pipe(gulp.dest('lib/assets/css'));
});

gulp.task('watch', function() {
	return gulp.watch(['lib/*.html', 'lib/*.php', 'lib/assets/**/*.scss', 'lib/assets/**/*.js'], ['inline', 'copy']);
});