@include('macros.form.base-head')
    {{Form::select(
        $name,
        $values,
        Form::getValueAttribute($name),
        ['id' => $name . '_id', 'class' => 'form-control', 'data-track-changes' => Form::getValueAttribute($name)])
    }}
@include('macros.form.base-foot')

@push('document-ready-stack')
    $('#{{$name . '_id'}}').select2();
@endpush