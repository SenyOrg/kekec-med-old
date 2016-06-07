{{--
    This is the head section of macros
 --}}

<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }} has-feedback">
    <label class="control-label col-sm-2" for="{{$name}}_id">
        {{$label}}
    </label>

    <div class="col-sm-10">
        @if ($errors->has($name))
            <label class="control-label">
                <i class="fa fa-times-circle-o"></i> Please check your input
            </label>
        @endif