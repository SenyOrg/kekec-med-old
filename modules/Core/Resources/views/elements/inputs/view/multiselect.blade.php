@forelse ($parameters['values'] as $title)
    <span class="label label-{{$parameters['labelClass']}}">@if (!empty($var = $parameters['icon']))<i
                class="{{$parameters['icon']}}"></i>&nbsp;@endif{{str_limit($title, $parameters['maxChars'])}}</span>
@empty
    <p>No selection</p>
@endforelse