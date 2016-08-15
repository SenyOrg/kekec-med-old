@forelse ($parameters['options'] as $id => $title)
    <div class="radio">
        <label>
            <input id="{{$parameters['id']}}"
                   name="{{$parameters['name']}}"
                   type="radio"
                   value="{{$id}}"
                   @if($parameters['value'] == $id)}} checked="checked" @endif
            >
            {{$title}}
        </label>
    </div>
@empty
@endforelse
@push('document-ready-stack')
$('input[name="{{$parameters['name']}}"]').iCheck({
checkboxClass: 'icheckbox_square-blue',
radioClass: 'iradio_square-blue',
increaseArea: '20%' // optional
});
@endpush
