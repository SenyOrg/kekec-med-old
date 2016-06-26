@extends('core::resourcefull.show')

@section('content')
    {{$model->getPresenter()->setViewMode('view')}}
    <form class="form-horizontal form-view">
        @if (!isset($create))
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-aqua-active">
                            <h3 class="widget-user-username">#{{$model->id}} {{$model->getFullName()}}</h3>
                            <h5 class="widget-user-desc">Created at {{$model->created_at}}</h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle bg-aqua-active" src="{{$model->getFileUrl('image')}}"
                                 alt="User Avatar">
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header"><i class="fa fa-phone fa-lg"></i></h5>
                                        <span class="description-text">{{$model->phone}}</span>
                                    </div>
                                    <!-- /.description-block -->
                            </div>
                                <!-- /.col -->
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header"><i class="fa fa-mobile fa-lg"></i></h5>
                                        <span class="description-text">{{$model->mobile}}</span>
                                    </div>
                                    <!-- /.description-block -->
                            </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header"><i class="fa fa-envelope"></i></h5>
                                        <span class="description-text">{{$model->email}}</span>
                                    </div>
                                    <!-- /.description-block -->
                            </div>
                                <!-- /.col -->
                        </div>
                            <!-- /.row -->
                    </div>
                </div>
            </div>
        </div>
        @endif

    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">General Data</h3>
                </div>
                <div class="box-body">
                    {{$model->getPresenter()->getFirstname()}}
                    {{$model->getPresenter()->getLastname()}}
                    {{$model->getPresenter()->getGender()}}
                    {{$model->getPresenter()->getBirthdate()}}
                    {{$model->getPresenter()->getImage()}}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-widget widget-user-2">
                <div class="widget-user-header bg-yellow">
                    <div class="widget-user-image">
                        <img class="img-circle"
                             src="https://nordost.aok.de/typo3conf/ext/aok_site_de/Resources/Public/Images/Svg/logo-aok.svg"
                             width="150" height="150">
                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username">{{$model->insurance->title}}</h3>
                    <h5 class="widget-user-desc">&nbsp;</h5>
                </div>
                <div class="box-footer">
                    {{$model->getPresenter()->getInsurance()}}
                    {{$model->getPresenter()->getInsuranceNo()}}
                    {{$model->getPresenter()->getInsuranceType()}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Contact Information</h3>
                </div>
                <div class="box-body">
                    {{$model->getPresenter()->getStreet()}}
                    {{$model->getPresenter()->getStreetNo()}}
                    {{$model->getPresenter()->getZipcode()}}
                    {{$model->getPresenter()->getPhone()}}
                    {{$model->getPresenter()->getMobile()}}
                    {{$model->getPresenter()->getEmail()}}
                </div>
            </div>
        </div>
        @if (!isset($create))
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="ion ion-clipboard"></i>
                        <h3 class="box-title">Tasks</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" id="task-body">
                        <ul class="todo-list ui-sortable">
                            @foreach($model->tasks AS $task)
                                <li>
                                    <!-- drag handle -->
                      <span class="handle ui-sortable-handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                                    <!-- checkbox -->
                                    <input type="checkbox" value="">
                                    <!-- todo text -->
                                    <span class="text">{{$task->title}}</span>
                                    <!-- Emphasis label -->
                                    <small class="label label-danger"><i
                                                class="fa fa-user fa-lg"></i> {{$task->creator->getFullname()}}</small>
                                    &nbsp;&nbsp;>&nbsp;&nbsp;
                                    <small class="label label-info"><i
                                                class="fa fa-user fa-lg"></i> {{$task->assignee->getFullname()}}</small>
                                    <!-- General tools such as edit or delete-->
                                    <div class="tools">
                                        <i class="fa fa-edit"></i>
                                        <i class="fa fa-trash-o"></i>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix no-border">
                        <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item
                        </button>
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