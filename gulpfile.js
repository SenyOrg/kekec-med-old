var gulp = require('gulp');
var elixir = require('laravel-elixir');
var themeStore = [];

themeStore.push(require('./modules/Theme/Resources/views/admin-lte/config.js'));

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

/**
 * Task: Global Assets
 *
 * This Task will process all files in modules/Theme/Resources/assets/scripts/
 */
gulp.task('global-assets', function () {
    elixir(function (mix) {
        mix.scripts(['../../../modules/Theme/Resources/assets/scripts/*.js'], 'public/vendor/libs.global.min.js')
            .styles(['../../../modules/Theme/Resources/assets/styles/*.css'], 'public/vendor/styles.global.min.css')
            .copy('modules/Theme/Resources/assets/audios/', 'public/vendor/audios');
    })
});

/**
 * Task: theme-assets
 *
 * This Task will process theme related assets by given configuration
 */
gulp.task('theme-assets', function () {
    elixir(function (mix) {
        if (themeStore.length) {
            themeStore.forEach(function (item, index, sourceArray) {
                // Handle Scripts
                mix.scripts(item.compress.scripts.files, item.compress.scripts.output);

                // Handle Styles
                mix.styles(item.compress.styles.files, item.compress.styles.output);

                // Manage copying jobs
                if (item.copyJobs && item.copyJobs.length) {
                    item.copyJobs.forEach(function (job) {
                        mix.copy(job.source, job.destination);
                    });
                }
            });
        }
    });
});

gulp.task('default', ['global-assets', 'theme-assets']);