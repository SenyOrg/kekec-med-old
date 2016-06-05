@extends('layouts.app.app')

@section('header-buttons')
    <li><a href="{{route('patient.create')}}" class="btn btn-default"><i class="fa fa-plus"></i> Create</a></li>
@endsection

@section('content')
    <div class="row">
        {!! $dataTable->table(['id' => 'patientTable', 'class' => 'table table-striped table-hover table-responsive']) !!}
    </div>
@endsection

@section('script')
{!! $dataTable->scripts() !!}

<script type="text/javascript">
    $(document).ready(function () {

    });
</script>

<style type="text/css">
    #patientTable td {
        vertical-align: middle;
    }

    #patientTable_wrapper {
        margin-top: -15px;
    }
</style>
@endsection