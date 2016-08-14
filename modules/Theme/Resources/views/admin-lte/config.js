var basePath = '../../../modules/Theme/Resources/views/admin-lte/';

module.exports = {
    title: 'Admin-LTE',
    description: 'This theme is the default one for KekecMed.',
    author: 'Selcuk Kekec',
    version: '0.1',
    copyJobs: [
        {
            source: 'modules/Theme/Resources/views/admin-lte/assets/plugins/font-awesome-4.6.3/fonts',
            destination: 'public/vendor/fonts/'
        },
        {
            source: 'modules/Theme/Resources/views/admin-lte/assets/plugins/ionicons-2.0.1/fonts',
            destination: 'public/vendor/fonts/'
        },
        {
            source: 'modules/Theme/Resources/views/admin-lte/assets/bootstrap/fonts',
            destination: 'public/vendor/fonts/'
        },
        {
            source: 'modules/Theme/Resources/views/admin-lte/assets/plugins/iCheck/flat',
            destination: 'public/vendor/flat'
        },
        {
            source: 'modules/Theme/Resources/views/admin-lte/assets/dist/img',
            destination: 'public/vendor/admin-lte/img'
        },
        {
            source: 'modules/Theme/Resources/views/admin-lte/assets/plugins/iCheck/square/blue*.png',
            destination: 'public/vendor/admin-lte/'
        }
    ],
    compress: {
        scripts: {
            files: [
                basePath + 'assets/plugins/jQuery/jQuery-2.2.0.min.js',
                basePath + 'assets/bootstrap/js/bootstrap.min.js',
                basePath + 'assets/plugins/sparkline/jquery.sparkline.min.js',
                basePath + 'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
                basePath + 'assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
                basePath + 'assets/plugins/knob/jquery.knob.js',
                basePath + 'assets/plugins/daterangepicker/daterangepicker.js',
                basePath + 'assets/plugins/datepicker/bootstrap-datepicker.js',
                basePath + 'assets/plugins/datepicker/locales/bootstrap-datepicker.de.js',
                basePath + 'assets/plugins/select2/select2.full.min.js',
                basePath + 'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
                basePath + 'assets/plugins/slimScroll/jquery.slimscroll.min.js',
                basePath + 'assets/plugins/iCheck/icheck.min.js',
                basePath + 'assets/plugins/fastclick/fastclick.js',
                basePath + 'assets/plugins/datatables/jquery.dataTables.min.js',
                basePath + 'assets/plugins/datatables/dataTables.bootstrap.min.js',
                basePath + 'assets/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js',
                basePath + 'assets/plugins/bootstrap-calendar-master/components/underscore/underscore-min.js',
                basePath + 'assets/plugins/bootstrap-calendar-master/components/jstimezonedetect/jstz.min.js',
                basePath + 'assets/plugins/bootstrap-calendar-master/js/calendar.js',
                basePath + 'assets/plugins/bootstrap-calendar-master/js/language/de-DE.js',
                basePath + 'assets/plugins/pace/pace.min.js',
                basePath + 'assets/dist/js/app.min.js',
                //basePath + 'assets/dist/js/pages/dashboard.js',
                basePath + 'assets/dist/js/demo.js',
                basePath + 'assets/plugins/input-mask/jquery.inputmask.bundle.js',
                basePath + 'assets/app.js'
            ],
            output: 'public/vendor/admin-lte/libs.min.js'
        },
        styles: {
            files: [
                basePath + 'assets/bootstrap/css/bootstrap.min.css',
                basePath + 'assets/plugins/select2/select2.min.css',
                basePath + 'assets/plugins/fullcalendar/fullcalendar.css',
                basePath + 'assets/dist/css/AdminLTE.min.css',
                basePath + 'assets/dist/css/skins/_all-skins.min.css',
                basePath + 'assets/plugins/morris/morris.css',
                basePath + 'assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
                basePath + 'assets/plugins/datepicker/datepicker3.css',
                basePath + 'assets/plugins/daterangepicker/daterangepicker-bs3.css',
                basePath + 'assets/plugins/datetimepicker/css/bootstrap-datetimepicker.css',
                basePath + 'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
                basePath + 'assets/plugins/datatables/dataTables.bootstrap.css',
                basePath + 'assets/plugins/pace/pace.min.css',
                basePath + 'assets/plugins/bootstrap-calendar-master/css/calendar.min.css',
                basePath + 'assets/plugins/iCheck/square/blue.css',
                basePath + 'assets/plugins/font-awesome-4.6.3/css/font-awesome.css',
                basePath + 'assets/plugins/ionicons-2.0.1/css/ionicons.css',
                basePath + 'assets/app.css'
            ],
            output: 'public/vendor/admin-lte/styles.min.css'
        }
    }
};