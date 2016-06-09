<!-- jQuery 2.2.0 -->
<script src="{{asset('modules/theme/admin-lte/plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('modules/theme/admin-lte/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{asset('modules/theme/admin-lte/plugins/morris/morris.min.js')}}"></script>-->
<!-- Sparkline -->
<script src="{{asset('modules/theme/admin-lte/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('modules/theme/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('modules/theme/admin-lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('modules/theme/admin-lte/plugins/knob/jquery.knob.js')}}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{asset('modules/theme/admin-lte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('modules/theme/admin-lte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('modules/theme/admin-lte/plugins/select2/select2.full.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('modules/theme/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('modules/theme/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('modules/theme/admin-lte/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('modules/theme/admin-lte/dist/js/app.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="{{asset('modules/theme/admin-lte/dist/js/pages/dashboard.js')}}"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="{{asset('modules/theme/admin-lte/dist/js/demo.js')}}"></script>

<!-- BootBox -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

<!-- InputMask -->
<script src="{{asset('modules/theme/admin-lte/plugins/input-mask/jquery.inputmask.bundle.js')}}"></script>


<!-- DataTables -->
<script type="text/javascript" src="{{asset('modules/theme/admin-lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('modules/theme/admin-lte/plugins/datatables/dataTables.bootstrap.js')}}"></script>
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>

<script type="text/javascript" src="{{asset('modules/theme/admin-lte/app.js')}}"></script>

@stack('scripts')

<script type="text/javascript">
    $(document).ready(function() {
       @stack('document-ready-stack')
    });
</script>