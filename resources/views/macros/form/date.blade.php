@include('macros.form.base-head')
<div class="input-group">
<div class="input-group-addon">
    <i class="fa fa-calendar"></i>
</div>
    <input type="text"
           class="form-control"
           data-track-changes="{{$app['form']->getValueAttribute($name, $value)}}"
           name="{{$name}}"
           id="{{$name}}_id"
           placeholder="{{$attributes['placeholder']}}"
           value="{{Form::getValueAttribute($name, $value)}}"
    />
</div>
@include('macros.form.base-foot')

@push('scripts')
<script type="text/javascript">
    //Datemask dd/mm/yyyy
    $("#{{$name}}_id").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
</script>
@endpush