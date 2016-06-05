<div class="form-group {{ $errors->has($namespace.'.'.$name) ? 'has-error' : '' }}">
    <label class="control-label col-sm-2" for="{{$namespace.'['.$name.']'}}">
        {{$label}}
    </label>

    <div class="col-sm-10">
    @if ($errors->has($namespace.'.'.$name))
        <label class="control-label">
        <i class="fa fa-times-circle-o"></i> Please check your input
        </label>
    @endif