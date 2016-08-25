<script type="text/javascript" src="{{asset('vendor/libs.global.min.js')}}"></script>
<script type="text/javascript" src="{{$vc->getThemeAsset('libs.min.js')}}"></script>

<!-- We have loaded all necessary dependencies. Now we can setup the core! -->
<script type="text/javascript" src="{{asset('modules/theme/core.js')}}"></script>
@include('theme::bootCore')
<script type="text/javascript" src="{{asset('modules/messenger/messenger.js')}}"></script>

<script src="/vendor/datatables/buttons.server-side.js"></script>

@stack('scripts')

<script type="text/javascript">
    $(document).ready(function () {
        @stack('document-ready-stack')
    });
</script>