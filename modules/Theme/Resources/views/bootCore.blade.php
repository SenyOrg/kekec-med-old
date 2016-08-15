{{-- This file configure the KekecMed Javascript-Core --}}

<script type="text/javascript">
    @if (Auth::getUser())
            kekecmed.user = {!! Auth::getUser()->toJson() !!};
    kekecmed.session = {!! json_encode(Auth::getSession()->all()) !!};
    @endif

    /**
     *  Location
     */
    kekecmed.location.base = '{{url('/')}}/';

    /**
     * Configuration: WebSocket
     */
    kekecmed.websocket._config = {
        host: '{{config('websocket.ip')}}',
        port: '{{config('websocket.port')}}',
        realm: '{{config('websocket.realm')}}'
    };
</script>