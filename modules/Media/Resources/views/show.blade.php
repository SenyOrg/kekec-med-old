@extends('core::resourcefull.show')

@section('append-head-buttons')
    <a href="{{$model->getDownloadlink()}}" class="btn btn-default"><i class=""></i> Download</a>
@endsection

@section('content')
    {{$model->getPresenter()->setViewMode('view')}}
    <form class="form-horizontal form-view">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">General Data</h3>
                    </div>
                    <div class="box-body">
                        {{$model->getPresenter()->getFilename()}}
                        {{$model->getPresenter()->getFiletype()}}
                        {{$model->getPresenter()->getFilesize()}}
                        {{$model->getPresenter()->getDescription()}}
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#task-body').slimScroll({
                height: '250px'
            });

            $('#deletePatient').data('deleteAction', function () {
                var form = $('#generalForm');
                var method = $('#generalFormMethod');
                form.attr('action', '{{route('patient.destroy', ['id' => $model->id])}}');
                method.val('DELETE');
                form.submit();
            });
        })
    </script>
@endsection