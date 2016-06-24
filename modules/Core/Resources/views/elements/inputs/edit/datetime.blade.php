@extends('core::elements.inputs.edit.generic-iconed-input')

@push('document-ready-stack')
/**
* Date: InputMask
*/
$('#{{$parameters['id']}}').inputmask('{{$vc->getDateTimeFormat()}}', {'placeholder': '{{$vc->getDateTimeFormat(true)}}'});

/**
* Date: Picker
*/
$('#{{$parameters['id']}}').datetimepicker({
format: '{{$vc->getDataTimeFormatAsMomentJS()}}',
@if (isset($parameters['linked']))
    useCurrent: false
@endif
});


@if (isset($parameters['linked']))
    /**
    * Handling for linked datetimefields
    */
    $('#{{$parameters['linked']}}').on('dp.change', function (e) {
    $('#{{$parameters['id']}}').data('DateTimePicker').minDate(e.date);
    });

    $('#{{$parameters['id']}}').on('dp.change', function (e) {
    $('#{{$parameters['linked']}}').data('DateTimePicker').maxDate(e.date);
    });
@endif
@endpush
