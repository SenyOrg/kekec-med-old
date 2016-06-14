@include('macros.form.base-head')
<select name="{{$name}}[]" id="{{$name}}_id" class="form-control" data-track-changes="0" multiple="multiple">
    @foreach($values as $id => $title)
        <option value="{{$id}}" {{(is_array($value) && in_array($id, $value)) ? 'selected="selected"' : ''}}>{{$title}}</option>
    @endforeach
</select>
@include('macros.form.base-foot')

@push('document-ready-stack')
$('#{{$name . '_id'}}').select2();
@endpush