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
        '../../../modules/Theme/Assets/admin-lte/bootstrap/css/bootstrap.min.css',
        '../../../modules/Theme/Assets/admin-lte/plugins/select2/select2.min.css',
        '../../../modules/Theme/Assets/admin-lte/dist/css/AdminLTE.min.css',
        '../../../modules/Theme/Assets/admin-lte/dist/css/skins/_all-skins.min.css',
        '../../../modules/Theme/Assets/admin-lte/plugins/iCheck/flat/blue.css',
        '../../../modules/Theme/Assets/admin-lte/plugins/morris/morris.css',
        '../../../modules/Theme/Assets/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
        '../../../modules/Theme/Assets/admin-lte/plugins/datepicker/datepicker3.css',
        '../../../modules/Theme/Assets/admin-lte/plugins/daterangepicker/daterangepicker-bs3.css',
        '../../../modules/Theme/Assets/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
        '../../../modules/Theme/Assets/admin-lte/app.css',
        '../../../modules/Theme/Assets/admin-lte/plugins/datatables/dataTables.bootstrap.css',
        '../../../modules/Theme/Assets/admin-lte/plugins/pace/pace.min.css',
    ]);

    mix.scripts([
        '../../../modules/Theme/Assets/admin-lte/plugins/jQuery/jQuery-2.2.0.min.js',
        '../../../modules/Theme/Assets/admin-lte/bootstrap/js/bootstrap.min.js',
        '../../../modules/Theme/Assets/admin-lte/plugins/sparkline/jquery.sparkline.min.js',
        '../../../modules/Theme/Assets/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        '../../../modules/Theme/Assets/admin-lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        '../../../modules/Theme/Assets/admin-lte/plugins/knob/jquery.knob.js',
        '../../../modules/Theme/Assets/admin-lte/plugins/daterangepicker/daterangepicker.js',
        '../../../modules/Theme/Assets/admin-lte/plugins/datepicker/bootstrap-datepicker.js',
        '../../../modules/Theme/Assets/admin-lte/plugins/select2/select2.full.min.js',
        '../../../modules/Theme/Assets/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        '../../../modules/Theme/Assets/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js',
        '../../../modules/Theme/Assets/admin-lte/plugins/fastclick/fastclick.js',
        '../../../modules/Theme/Assets/admin-lte/plugins/datatables/jquery.dataTables.min.js',
        '../../../modules/Theme/Assets/admin-lte/plugins/datatables/dataTables.bootstrap.min.js',
        '../../../modules/Theme/Assets/admin-lte/plugins/pace/pace.min.js',
        '../../../modules/Theme/Assets/admin-lte/dist/js/app.min.js',
        //'../../../modules/Theme/Assets/admin-lte/dist/js/pages/dashboard.js',
        '../../../modules/Theme/Assets/admin-lte/dist/js/demo.js',
        '../../../modules/Theme/Assets/admin-lte/plugins/input-mask/jquery.inputmask.bundle.js',
        '../../../modules/Theme/Assets/admin-lte/app.js',
    ]);
});
