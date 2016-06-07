@include('macros.form.base-head')
    {{Form::select(
        $name,
        $values,
        Form::getValueAttribute($name),
        ['class' => 'form-control', 'data-track-changes' => Form::getValueAttribute($name)])
    }}
@include('macros.form.base-foot')