<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script type="text/javascript" src="{{asset('assets/libs.min.js')}}"></script>
<!-- BootBox -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script>
<script type="text/javascript" src="{{asset('modules/theme/admin-lte/app.js')}}"></script>

@stack('scripts')

<script type="text/javascript">
    $(document).ready(function() {
       @stack('document-ready-stack')
    });
</script>