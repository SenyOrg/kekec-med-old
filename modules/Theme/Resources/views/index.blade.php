@extends('theme::admin-lte.app.main')

@section('content')

    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('theme.name') !!}
    </p>

@stop