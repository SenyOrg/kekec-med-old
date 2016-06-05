<div class="form-group {{ $errors->has($attributes['namespace'].'['.$name.']') ? 'has-error' : '' }}">
    <label class="control-label col-sm-2" for="{{$attributes['namespace'].'['.$name.']'}}">
        {{$attributes['label']}}
        @if ($errors->has($attributes['namespace'].'['.$name.']'))
        <i class="fa fa-times-circle-o"></i> Input with error
        @endif
    </label>

    <div class="col-sm-10">
        @yield('inputarea')
        @if ($errors->has($attributes['namespace'].'['.$name.']'))
        <span class="help-block">Help block with error</span>
        @endif
    </div>
</div>
