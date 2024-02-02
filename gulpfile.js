import stylus from 'gulp-stylus';
import autoprefixer from 'gulp-autoprefixer'
import remember from 'gulp-remember';
import concat from 'gulp-concat';
import browserSync from 'browser-sync';
import gulp from 'gulp';
import { fileURLToPath } from 'url';
import { dirname } from 'path';

//let stylus = require('gulp-stylus');
// let autoprefixer = require('gulp-autoprefixer');
// let remember = require('gulp-remember');
// let concat = require('gulp-concat');
// let browserSync = require('browser-sync').create();
// let gulp = require('gulp');

browserSync.create()
browserSync.init({server: './'});
const __filename = fileURLToPath(import.meta.url);
const __dirname = dirname(__filename);

let way = {
    stylus: {
        basic: 'resources/bricks/basic',
        extra: 'resources/bricks/extra',
        tools: 'resources/stylus',
        css: 'resources/css'
    }
};

let stylusBasic = () =>
    gulp.src(
        [
            way.stylus.tools + '/normalize.styl',
            way.stylus.basic + '/**/*.styl'
        ],
        {since: gulp.lastRun(stylusBasic)}
        )
    .pipe( stylus({
            import: [
                __dirname + '/' + way.stylus.tools + '/variables.styl',
                __dirname + '/' + way.stylus.tools + '/mixins.styl'
            ]
        }))
    .pipe(autoprefixer())
    .pipe(remember('basic'))
    .pipe(concat('basic.css'))
    .pipe( gulp.dest(way.stylus.css) )
    .pipe( browserSync.stream() ) ;

let stylusExtra = () =>
    gulp.src(
        [   way.stylus.extra + '/**/*.styl'],
        {since: gulp.lastRun(stylusExtra)}
        )
    .pipe( stylus({
            import: [
                __dirname + '/' + way.stylus.tools + '/variables.styl',
                __dirname + '/' + way.stylus.tools + '/mixins.styl'
            ]
        }))
    .pipe(autoprefixer())
    .pipe(remember('extra'))
    .pipe(concat('extra.css'))
    .pipe( gulp.dest(way.stylus.css) )
    .pipe( browserSync.stream() ) ;

let stylusWatch = () => {
    gulp.watch(
        [   way.stylus.basic + '/**/*.styl'],
        {delay: 80},
        stylusBasic
    );

    gulp.watch(
        [   way.stylus.extra + '/**/*.styl'],
        {delay: 80},
        stylusExtra
    );
};

gulp.task('default', gulp.series(stylusBasic, stylusExtra, stylusWatch));
