@extends('core::elements.inputs.edit.generic-iconed-input')

@push('document-ready-stack')
$('#{{$parameters['id']}}').inputmask("{{$vc->getDateFormat()}}", {"placeholder": "{{$vc->getDateFormat()}}"});
$('#{{$parameters['id']}}').datepicker({
autoclose: true,
format: '{{$vc->getDateFormat()}}',
language: 'de-DE'
});
@endpush
