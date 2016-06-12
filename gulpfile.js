var elixir = require('laravel-elixir');

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

elixir(function(mix) {
    mix.styles([
        '../../../modules/Theme/Resources/views/admin-lte/assets/bootstrap/css/bootstrap.min.css',
        '../../../modules/Theme/Resources/views/admin-lte/assets/plugins/select2/select2.min.css',
        '../../../modules/Theme/Resources/views/admin-lte/assets/dist/css/AdminLTE.min.css',
        '../../../modules/Theme/Resources/views/admin-lte/assets/dist/css/skins/_all-skins.min.css',
        '../../../modules/Theme/Resources/views/admin-lte/assets/plugins/iCheck/flat/blue.css',
        '../../../modules/Theme/Resources/views/admin-lte/assets/plugins/morris/morris.css',
        '../../../modules/Theme/Resources/views/admin-lte/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
        '../../../modules/Theme/Resources/views/admin-lte/assets/plugins/datepicker/datepicker3.css',
        '../../../modules/Theme/Resources/views/admin-lte/assets/plugins/daterangepicker/daterangepicker-bs3.css',
        '../../../modules/Theme/Resources/views/admin-lte/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
        '../../../modules/Theme/Resources/views/admin-lte/assets/plugins/datatables/dataTables.bootstrap.css',
        '../../../modules/Theme/Resources/views/admin-lte/assets/plugins/pace/pace.min.css',
        '../../../modules/Theme/Resources/views/admin-lte/assets/app.css',
    ], 'public/assets/styles.min.css');

    mix.scripts([
        '../../../modules/Theme/Resources/views/admin-lte/assets/plugins/jQuery/jQuery-2.2.0.min.js',
        '../../../modules/Theme/Resources/views/admin-lte/assets/bootstrap/js/bootstrap.min.js',
        '../../../modules/Theme/Resources/views/admin-lte/assets/plugins/sparkline/jquery.sparkline.min.js',
        '../../../modules/Theme/Resources/views/admin-lte/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        '../../../modules/Theme/Resources/views/admin-lte/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        '../../../modules/Theme/Resources/views/admin-lte/assets/plugins/knob/jquery.knob.js',
        '../../../modules/Theme/Resources/views/admin-lte/assets/plugins/daterangepicker/daterangepicker.js',
        '../../../modules/Theme/Resources/views/admin-lte/assets/plugins/datepicker/bootstrap-datepicker.js',
        '../../../modules/Theme/Resources/views/admin-lte/assets/plugins/select2/select2.full.min.js',
        '../../../modules/Theme/Resources/views/admin-lte/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        '../../../modules/Theme/Resources/views/admin-lte/assets/plugins/slimScroll/jquery.slimscroll.min.js',
        '../../../modules/Theme/Resources/views/admin-lte/assets/plugins/fastclick/fastclick.js',
        '../../../modules/Theme/Resources/views/admin-lte/assets/plugins/datatables/jquery.dataTables.min.js',
        '../../../modules/Theme/Resources/views/admin-lte/assets/plugins/datatables/dataTables.bootstrap.min.js',
        '../../../modules/Theme/Resources/views/admin-lte/assets/plugins/pace/pace.min.js',
        '../../../modules/Theme/Resources/views/admin-lte/assets/dist/js/app.min.js',
        //'../../../modules/Theme/Resources/views/admin-lte/assets/dist/js/pages/dashboard.js',
        '../../../modules/Theme/Resources/views/admin-lte/assets/dist/js/demo.js',
        '../../../modules/Theme/Resources/views/admin-lte/assets/plugins/input-mask/jquery.inputmask.bundle.js',
    ], 'public/assets/libs.min.js');
});
