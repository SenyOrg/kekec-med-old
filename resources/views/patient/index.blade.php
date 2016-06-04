@extends('layouts.app.app')

@section('content')
    <div class="row">
        {!! $dataTable->table(['id' => 'patientTable', 'class' => 'table table-striped table-hover']) !!}
    </div>
@endsection

@section('script')
{!! $dataTable->scripts() !!}

<script type="text/javascript">
    $(document).ready(function () {
        $('#patientTable').attr('style', '');
        window.laravelDataTables['patientTable'].dataTable().fixedHeader.enable( true );
    });
</script>

<style type="text/css">
    #patientTable td {
        vertical-align: middle;
    }
</style>
@endsection