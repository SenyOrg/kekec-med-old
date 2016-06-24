@extends('core::elements.inputs.edit.text')

@section('before')
    <div class="input-group">
        <div class="input-group-addon">
            <i class="{{$configuration['icon']}}"></i>
        </div>
        @endsection
        @section('after')
    </div>
@endsection