@forelse ($parameters['options'] as $id => $title)
    <div class="checkbox">
        <label>
            <input id="{{$parameters['id']}}[]"
                   name="{{$parameters['name']}}[]"
                   value={{$id}}
                           type="checkbox"
                   @if (in_array($id, $parameters['values'])) checked="checked" @endif
            >
            {{$title}}
        </label>
    </div>
@empty

@endforelse

@push('document-ready-stack')
$('input[name="{{$parameters['name']}}[]"]').iCheck({
checkboxClass: 'icheckbox_square-blue',
radioClass: 'iradio_square-blue',
increaseArea: '20%' // optional
});
@endpush
