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
           value="{{Form::getValueAttribute($name, $value)}}"
    />
</div>
@include('macros.form.base-foot')

@push('scripts')
<script type="text/javascript">
    $("#{{$name}}_id").inputmask("{{$vc->getDateTimeFormat()}}", {"placeholder": "{{$vc->getDateTimeFormat(true)}}"});
    $('#{{$name}}_id').datetimepicker({
        format: '{{$vc->getDataTimeFormatAsMomentJS()}}',
        @if (isset($attributes['linked']))
        usCurrent: false
        @endif
    });

    /**
     * Handling for linked datetimefields
     */
    @if (isset($attributes['linked']))
    $("#{{$attributes['linked']}}_id").on("dp.change", function (e) {
        $("#{{$name}}_id").data("DateTimePicker").minDate(e.date);
    });
    $("#{{$name}}_id").on("dp.change", function (e) {
        $('#{{$attributes['linked']}}_id').data("DateTimePicker").maxDate(e.date);
    });
    @endif
</script>
@endpush