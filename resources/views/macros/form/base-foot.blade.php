{{--
    This is the foot section of macros
 --}}

<span class="glyphicon glyphicon-time form-control-feedback hidden" aria-hidden="true"></span>
<span id="{{$name}}_span_sr" class="sr-only">(success)</span>
@if ($errors->has($name))
    <span class="help-block">
        <strong>{{ $errors->first($name) }}</strong>
    </span>
    @endif
    </div>
</div>