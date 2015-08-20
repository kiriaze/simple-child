'use strict';

var config         = require('../../config'),
	gulp           = require('gulp'),
	browserSync    = require('browser-sync');

// no optimzation, might as well just be pulling
// all other assets besides fonts,js,css,img
gulp.task('video', function() {
	return gulp.src(config.video.src)
		.pipe(gulp.dest(config.video.dest))
		.pipe(browserSync.reload({stream:true}))
});
