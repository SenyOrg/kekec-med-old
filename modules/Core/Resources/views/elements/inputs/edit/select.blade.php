<select name="{{$parameters['name']}}" id="{{$parameters['id']}}" class="form-control"
        @if ($configuration['trackChanges']) data-track-changes="{{$parameters['value']}}" @endif>
    @if($configuration['emptyOption'])
        <option value="0">-</option>
    @endif
    @foreach($parameters['options'] as $id => $title)
        <option value="{{$id}}" {{($parameters['value'] == $id) ? 'selected="selected"' : ''}}>{{$title}}</option>
    @endforeach
</select>

@if ($parameters['select2'] === true)
    @push('document-ready-stack')
    $('#{{$parameters['id']}}').select2({
    /**
    * @todo: Default configuration
    */
    });
    @endpush
@endif