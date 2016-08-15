<select name="{{$parameters['name']}}[]"
        id="{{$parameters['id']}}"
        class="form-control"
        @if ($configuration['trackChanges']) data-track-changes="0" @endif
        @if ($parameters['multiple']) multiple="multiple" @endif
>
    @if($configuration['emptyOption'])
        <option value="0">-</option>
    @endif
    @foreach($parameters['options'] as $objectType => $objects)
        <optgroup label="{{$objectType}}">
            @foreach($objects as $id => $title)
                <option value="{{$id}}" {{(in_array($id, $parameters['values'])) ? 'selected="selected"' : ''}}>{{$title}}</option>
            @endforeach
        </optgroup>
    @endforeach
</select>

@push('document-ready-stack')
$('#{{$parameters['id']}}').select2({
/**
* @todo: Default configuration
*/
});
@endpush
