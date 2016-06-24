@yield('before')
<input
        id="{{$parameters['id']}}"
        name="{{$parameters['name']}}"
        type="{{$parameters['type']}}"
        value="{{$parameters['value']}}"
        placeholder="{{$parameters['placeholder']}}"
        {{$parameters['readonly'] or ''}}
        {{$parameters['disabled'] or ''}}
        class="{{$parameters['class']}}"
        style="{{$parameters['style']}}"
        @yield('input-includes')

        @if($configuration['trackChanges'])
        data-track-changes="{{$parameters['value']}}"
        @endif

        {{HTML::attributes($parameters['attributes'])}}
/>
@yield('after')