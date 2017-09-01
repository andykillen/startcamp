/**
 * @author Andrew Killen
 * @description 
 * 
 * Gulp file manages SASS, CSS and JS concatonation and minification, it has a 
 * watch command to keep an eye on everything that changes and automatically
 * makes everything wanted. 
 * 
 */

var gulp = require('gulp');
var concat = require('gulp-concat');
var uglify = require("gulp-uglify");
var cleanCSS = require('gulp-clean-css');
var rename = require("gulp-rename");
var sass = require('gulp-sass');
var pump = require('pump')

gulp.task('concat_admin', function() {
  return gulp.src('js/admin/*.js')
    .pipe(concat('admin.js'))
    .pipe(gulp.dest('js/'));
});

gulp.task('concat_frontend', function() {
  return gulp.src('js/frontend/*.js')
    .pipe(concat('theme.js'))
    .pipe(gulp.dest('js/'));
});

gulp.task('minify_js', function () {
  var files = ['admin', 'theme'];
  var options = {};
  for(i=0; i<files.length;i++){
    pump([
        gulp.src('js/'+files[i]+'.js'),
        uglify(options),
        rename(files[i]+'.min.js'),
        gulp.dest('js/')
      ]
    );
  }
});

gulp.task('minify_css', function(){
    var files = ['admin', 'print', 'frontend'];
    for(i=0; i<files.length;i++){
        pump([
            gulp.src('css/'+files[i]+'.css'),
            cleanCSS({compatibility: 'ie9'}),
            rename(files[i]+'.min.css'),
            gulp.dest('css')
        ]);
    }
});

gulp.task('sass_build', function(){
    var files = ['admin', 'print', 'frontend'];
    for(i=0; i<files.length;i++){
        pump([
            gulp.src('sass/'+files[i]+'.scss'),
            sass.sync().on('error', sass.logError),
            rename(files[i]+'.css'),
            gulp.dest('css/')
        ]);
    }
});

gulp.task('watch',function() {
  gulp.watch(['sass/**/**/*.scss','sass/**/*.scss','sass/*.scss'], ['sass_build', 'minify_css']);
  gulp.watch('js/fontend/*.js', ['concat_frontend','minify_js']);
  gulp.watch('js/admin/*.js', ['concat_admin','minify_js']);
});

gulp.task('load',
          ['sass_build',
           'concat_frontend',
           'concat_admin',
           'minify_js',
           'minify_css']);

gulp.task('default', ['load','watch']);
