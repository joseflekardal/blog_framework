const gulp = require('gulp');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');
const browserSync = require('browser-sync');
const reload = browserSync.reload;

gulp.task('sass', () => {
  gulp.src('./assets/sass/style.scss')
    .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
    .pipe(autoprefixer({browsers: ['last 2 versions']}))
    .pipe(gulp.dest('./'))
    .pipe(reload({stream: true}));
});

gulp.task('browser-sync', () => {
    browserSync({
        proxy: 'http://localhost:8888/',
        files: ["**/*.php"]
    });
});

gulp.task('watch', () => {
    gulp.watch('./assets/sass/**/*.scss', ['sass']);
    gulp.watch('./assets/sass/**/*.sass', ['sass']);
});

gulp.task('default', ['sass', 'browser-sync', 'watch']);
