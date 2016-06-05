@extends('components.form.base')
@section('inputarea')
    <input type="text"
           class="form-control"
           id="inputError"
           name="{{$attributes['namespace'].'['.$name."]"}}"
           placeholder="{{$attributes['placeholder']}}"
           value="{{$app['form']->getValueAttribute($name, $value)}}"
    />
@endsection