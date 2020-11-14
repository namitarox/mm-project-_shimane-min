import gulp from 'gulp';
import plumber from 'gulp-plumber';
import sass from 'gulp-sass';
import autoprefixer from 'gulp-autoprefixer';
import webpack from 'webpack';
import webpackStream from 'webpack-stream';
import bs from 'browser-sync';
import notify from 'gulp-notify';
import notifier from 'node-notifier';
import sourcemaps from 'gulp-sourcemaps';
import env from 'node-env-file';
import eslint from 'gulp-eslint';

env('.env');

const browser = require("browser-sync").create();
const port = `localhost:${process.env.WP_PORT}`;
const webpackDevConfig = require('./webpack.config');
const path = `wp-content/themes/${process.env.THEME}`;

gulp.task('scss-dev', () => {
  return gulp.src('src/scss/*.scss')
    .pipe(plumber({
      errorHandler: notify.onError('<%= error.message %>')
    }))
    .pipe(sourcemaps.init())
    .pipe(sass({outputStyle: 'compressed'}))
    .pipe(autoprefixer({
      grid: true
    }))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(`${path}/assets/css/`));
});


gulp.task('webpack-dev', () => {
  return webpackStream(webpackDevConfig, webpack)
    .on('error', function (error) {
      notifier.notify({
        'title': `error:webpack`,
        'message': error
      });
      this.emit('end');
    })
    .pipe(gulp.dest(`${path}/assets/js/`));
});

gulp.task('lint', () => {
  return gulp.src(['src/js/**/*.js', 'src/js/*.js'])
      .pipe(eslint({ useEslintrc: true })) // .eslintrc を参照
      .pipe(eslint.format())
      .pipe(eslint.failAfterError());
});

gulp.task('server',() => {
  browser.init({
    port: 8000,
    proxy: port, //MAMPのlocalhostに合わせて下さい。
    notify: true,
  });
  console.log('Server was launched');
});

gulp.task('bs-reload', (done) => {
  browser.reload();
  done();
  console.log('Browser reload completed');
});

gulp.task('css', gulp.series(
  'scss-dev',
  'bs-reload'
));

gulp.task('js', gulp.series(
  'lint',
  'webpack-dev',
  'bs-reload'
));

gulp.task('init', gulp.series(
  gulp.parallel('scss-dev', 'webpack-dev'),
  'server',
));

gulp.task('watch-files', (done) => {
  gulp.watch([`${path}/*.php`, `${path}/**/*.php`],gulp.task('bs-reload'));
  gulp.watch([`src/js/**/*.js`, `src/js/*.js`], gulp.task('js'));
  gulp.watch([`src/scss/*.scss`, `src/scss/**/*.scss`], gulp.task('css'));
  done();
  console.log(('gulp watch started'));
});

gulp.task('default',gulp.series('watch-files','init',(done) =>{
  done();
}));
