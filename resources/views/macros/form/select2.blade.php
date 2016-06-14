@include('macros.form.selectbox')
@push('document-ready-stack')
    $('#{{$name . '_id'}}').select2();
@endpush