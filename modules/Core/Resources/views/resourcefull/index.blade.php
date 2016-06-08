{{--
    Generic index template
--}}
@extends($vc->getTheme())

@section('head-buttons')
    <li><a href="{{$vc->controller()->getCreateButtonRoute()}}" class="btn btn-default"><i class="fa fa-plus"></i>
            Create</a></li>
@endsection

@section('content')
    <div class="row">
        {!!
            $dataTable->table(['id' => $vc->dataTable()->getTableID(), 'class' => 'table table-striped table-hover table-responsive'])
        !!}
    </div>
@endsection

@push('scripts')
{!! $dataTable->scripts() !!}
@endpush