@extends('core::resourcefull.show')

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
                        {{$model->getPresenter()->getDescription()}}
                        {{$model->getPresenter()->getPatient()}}
                        {{$model->getPresenter()->getEvent()}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @if (!isset($create))
                <div class="col-md-6">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Media</h3>
                        </div>
                        <div class="box-body">
                            {!! view('media::embedded.show', ['medias' => $model->media()->get()]) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Notices</h3>
                        </div>
                        <div class="box-body">
                            {!! view('notice::embedded.show', ['notices' => $model->notices()->get()]) !!}
                        </div>
                        <div class="box-footer clearfix no-border">
                            <a href="{{ route('notice.create') }}?object={{get_class($model)}}-{{$model->id}}"
                               class="btn btn-default pull-right"><i class="fa fa-plus"></i> Create Notice</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header ui-sortable-handle" style="cursor: move;">
                            <i class="ion ion-clipboard"></i>
                            <h3 class="box-title">Tasks</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" id="task-body">
                            {!! view('task::embedded.show', ['tasks' => $model->tasks()->get()]) !!}
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix no-border">
                            <a href="{{ route('task.create') }}?object={{get_class($model)}}-{{$model->id}}"
                               class="btn btn-default pull-right"><i class="fa fa-plus"></i> Create Task</a>
                        </div>
                    </div>
                </div>
            @endif
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