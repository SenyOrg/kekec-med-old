@include('macros.form.base-head')
<div class="input-group">
<div class="input-group-addon">
    <i class="fa fa-envelope"></i>
</div>
    <input type="text"
           class="form-control"
           data-track-changes="{{$app['form']->getValueAttribute($name, $value)}}"
           name="{{$name}}"
           id="{{$name}}_id"
           value="{{Form::getValueAttribute($name, $value)}}"
    />
</div>
@include('macros.form.base-foot')

@push('scripts')
<script type="text/javascript">
    $("#{{$name}}_id").inputmask("email", { "clearIncomplete": true });
</script>
@endpush