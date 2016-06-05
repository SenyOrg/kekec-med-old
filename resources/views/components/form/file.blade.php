@include('components.form.head')
        <input type="file"
               class="form-control"
               name="{{$namespace.'['.$name."]"}}"
               id="{{$namespace.'['.$name."]"}}"
        />
@include('components.form.foot')