var fileinclude = require('gulp-file-include'); // Files include
var gulp = require('gulp'); // Require gulp

// Sass dependencies
var sass = require('gulp-sass'); // Compile Sass into CSS
var minifyCSS = require('gulp-minify-css'); // Minify the CSS

// Minification dependencies
var concat = require('gulp-concat'); // Join all JS files together to save space
var uglify = require('gulp-uglify'); // Minify JavaScript
var imagemin = require('gulp-imagemin'); // Minify images

// Other dependencies
var autoprefixer = require('gulp-autoprefixer');
var size = require('gulp-size'); // Get the size of the project
var gutil = require('gulp-util');

// error checking
// .on('error', function(err) {
// 	gutil.log(gutil.colors.red('[Error]'), err.toString());
// })

// Tasks -------------------------------------------------------------------- >

// Task to compile Sass file into CSS, and minify CSS into build directory
gulp.task('styles', function() {
	gulp
		.src('./assets/src/sass/app.scss')
		.pipe(sass({ outputStyle: 'expanded' }).on('error', sass.logError))
		.pipe(gulp.dest('assets/dist/css'))
		.pipe(
			autoprefixer({
				browsers: [ 'last 2 versions' ]
			})
		)
		.pipe(gulp.dest('assets/dist/css'));
});

gulp.task('fonts', function() {
	gulp
		.src('./assets/src/fonts/**/*.*')
		.pipe(gulp.dest('assets/dist/fonts'))
		
	});


// Task to concat, strip debugging and minify JS files
gulp.task('scripts', function() {
	gulp
		.src('./assets/src/js/!(_*).js')
		.pipe(
			fileinclude({
				prefix: '@@',
				basepath: '@file'
			})
		)
		.pipe(gulp.dest('./assets/dist/js'));
});

// Task to minify images into build
gulp.task('images', function() {
	gulp
		.src('./app/images/*')
		.pipe(
			imagemin({
				progressive: true
			})
		)
		.pipe(gulp.dest('./build/images'));
});

// Build final dist
gulp.task('build', function() {
	gulp
		.src('./assets/src/js/!(_*).js')
		.pipe(
			fileinclude({
				prefix: '@@',
				basepath: '@file'
			})
		)
		.pipe(
			uglify({
				compress: {
					drop_console: true
				}
			})
		)
		.pipe(gulp.dest('./assets/dist/js'))
		.pipe(
			size({
				title: 'JS - ',
				showFiles: true
			})
		);

	gulp
		.src('./assets/src/sass/app.scss')
		.pipe(sass({ outputStyle: 'expanded' }).on('error', sass.logError))
		.pipe(gulp.dest('./assets/dist/css'))
		.pipe(
			autoprefixer({
				browsers: [ 'last 2 versions' ]
			})
		)
		.pipe(minifyCSS())
		.pipe(gulp.dest('assets/dist/css'))
		.pipe(
			size({
				title: 'CSS - ',
				showFiles: true
			})
		);
});

// Run all Gulp tasks and serve application
gulp.task('default', [ 'styles', 'fonts',  'scripts' ], function() {
	gulp.watch([ './assets/src/sass/*.scss', 'assets/src/sass/**/*.scss' ], [ 'styles' ]);
	gulp.watch('./assets/src/js/*.js', [ 'scripts' ]);
	gulp.watch('./assets/src/fonts/**/*.*', [ 'fonts' ]);
});
