@include('components.form.head')
        <input type="text"
               class="form-control"
               name="{{$namespace.'['.$name."]"}}"
               id="{{$namespace.'['.$name."]"}}"
               placeholder="{{$attributes['placeholder']}}"
               value="{{$app['form']->getValueAttribute($name, $value)}}"
        />
@include('components.form.foot')