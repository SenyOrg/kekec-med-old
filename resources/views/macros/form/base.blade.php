<div class="form-group {{ $errors->has($namespace.'.'.$name) ? 'has-error' : '' }} has-feedback">
    <label class="control-label col-sm-2" for="{{$namespace.'['.$name.']'}}">
        {{$label}}
    </label>

    <div class="col-sm-10">
        @if ($errors->has($namespace.'.'.$name))
            <label class="control-label">
                <i class="fa fa-times-circle-o"></i> Please check your input
            </label>
        @endif
            @yield('macro-content')
            <span class="glyphicon glyphicon-time form-control-feedback hidden" aria-hidden="true"></span>
            <span id="{{$namespace.'['.$name."]"}}" class="sr-only">(success)</span>
            @if ($errors->has($namespace.'.'.$name))
                <span class="help-block">
        <strong>{{ $errors->first($namespace.'.'.$name) }}</strong>
    </span>
            @endif
    </div>
</div>