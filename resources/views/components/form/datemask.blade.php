@include('components.form.head')
<div class="input-group">
        <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
        </div>
        <input type="text"
               class="form-control"
               name="{{$namespace.'['.$name."]"}}"
               id="{{$namespace.'['.$name."]"}}"
               placeholder="{{$attributes['placeholder']}}"
               value="{{$app['form']->getValueAttribute($name, $value)}}"
               data-inputmask="'alias': 'yyyy-mm-dd'" data-mask=""
        />
</div>
@include('components.form.foot')

<script type="text/javascript">
        $(document).ready(function () {
        $("#{{$namespace.'['.$name."]"}}").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd  "});
        });
</script>