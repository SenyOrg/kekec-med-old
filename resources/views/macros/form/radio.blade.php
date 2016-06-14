@include('macros.form.base-head')
<div class="form-group">
    @foreach($values as $id => $title)
        <div class="radio">
            <label>
                <input type="radio" name="{{$name}}" id="{{$name}}_{{$id}}" value="{{$id}}" {{($id == Form::getValueAttribute($name, $value)) ? 'checked' : ''}}>
                {{$title}}
            </label>
        </div>
    @endforeach
</div>
@include('macros.form.base-foot')

@push('scripts')
<script type="text/javascript">
    $('input[type="radio"]').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });
</script>
@endpush