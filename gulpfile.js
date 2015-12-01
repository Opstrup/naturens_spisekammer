var gulp = require('gulp');
var codecept = require('gulp-codeception');
var run = require('gulp-run');
var notify = require('gulp-notify');

gulp.task('default', function(){
    console.log('hello');
});

gulp.task('acceptance', function(){
    var options = {testSuite: 'acceptance', notify: true};

    gulp.src('tests/*.php')
        .pipe(run('clear'))
        .pipe(codecept('', options))
        .on('error', notify.onError({
            title: 'Error',
            message: 'Some tests failed'
        }))
        .pipe(notify({
            title: 'Success',
            message: 'All tests are green..'
        }));
});

gulp.task('functional', function(){
    var options = {testSuite: 'functional', notify: true};

    gulp.src('tests/*.php')
        .pipe(run('clear'))
        .pipe(codecept('', options))
        .on('error', notify.onError({
            title: 'Error',
            message: 'Some tests failed'
        }))
        .pipe(notify({
            title: 'Success',
            message: 'All tests are green..'
        }));
});

gulp.task('unit', function(){
    var options = {testSuite: 'unit', notify: true};

    gulp.src('tests/*.php')
        .pipe(run('clear'))
        .pipe(codecept('', options))
        .on('error', notify.onError({
            title: 'Error',
            message: 'Some tests failed'
        }))
        .pipe(notify({
            title: 'Success',
            message: 'All tests are green..'
        }));
});

gulp.task('watch', function(){
    gulp.watch(['app/**/*.php', 'tests/unit/*.php'], ['unit']);
});