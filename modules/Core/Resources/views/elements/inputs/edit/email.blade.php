@extends('core::elements.inputs.edit.generic-iconed-input')

@push('document-ready-stack')
$('#{{$parameters['id']}}').inputmask("email", { "clearIncomplete": true });
@endpush
