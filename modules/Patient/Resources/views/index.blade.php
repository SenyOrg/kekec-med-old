@extends($vc->getTheme())

@section('head-buttons')
    <li><a href="{{route('patient.create')}}" class="btn btn-default"><i class="fa fa-plus"></i> Create</a></li>
@endsection

@section('content')
    <div class="row">
        {!! $dataTable->table(['id' => 'patientTable', 'class' => 'table table-striped table-hover table-responsive']) !!}
    </div>
@endsection

@push('scripts')
{!! $dataTable->scripts() !!}

<style type="text/css">
    #patientTable td {
        vertical-align: middle;
    }

    #patientTable_wrapper {
        margin-top: -15px;
    }
</style>
@endpush