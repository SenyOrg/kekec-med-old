@include('macros.form.base-head')
    <select name="{{$name}}" id="{{$name}}_id" class="form-control" data-track-changes="{{Form::getValueAttribute($name, $value)}}">
        @foreach($values as $id => $title)
            <option value="{{$id}}" {{(Form::getValueAttribute($name, $value) == $id) ? 'selected="selected"' : ''}}>{{$title}}</option>
        @endforeach
    </select>
@include('macros.form.base-foot')