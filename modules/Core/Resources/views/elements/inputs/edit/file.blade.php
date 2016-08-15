@extends('core::elements.inputs.edit.generic-input')
@section('input-includes')
    @if ($parameters['accept'])
        accept="{{$parameters['accept']}}"
    @endif
@endsection