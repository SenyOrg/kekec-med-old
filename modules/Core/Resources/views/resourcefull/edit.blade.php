{{--
    Generic edit template
--}}

@extends($vc->getTheme())

@section('head-buttons')
    @if (isset($create))
        <li>
            <button class="btn btn-default" type="submit"><i class="fa fa-plus"></i> Create</button>
        </li>
    @else
        <li>
            <button class="btn btn-success" type="submit"><i class="fa fa-floppy-o"></i> Save</button>
        </li>
    @endif
@endsection