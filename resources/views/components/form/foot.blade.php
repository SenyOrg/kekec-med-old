@if ($errors->has($namespace.'.'.$name))
    <span class="help-block">
        <strong>{{ $errors->first($namespace.'.'.$name) }}</strong>
    </span>
    @endif
    </div>
    </div>