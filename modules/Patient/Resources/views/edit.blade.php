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

@section('content-start')
    @if (isset($create))
        {{ Form::model($model, array('route' => array('patient.store'), 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true)) }}
    @else
        {{ Form::model($model, array('route' => array('patient.update', $model->id), 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true)) }}
        {{method_field('PUT')}}
    @endif
@endsection


@section('content')

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
                        <img class="img-circle bg-aqua-active" src="{{$model->getImageUrl()}}" alt="User Avatar">
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
                    {{Form::bsText('firstname', 'Firstname')}}
                    {{Form::bsText('lastname', 'Lastname')}}
                    {{Form::bsText('gender', 'Gender')}}
                    {{Form::bsDate('birthdate', 'Birthdate')}}
                    {{Form::bsFile('image', 'Image')}}
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
                    {{Form::bsText('insurance_id', 'Insurance', 'formData', $model->insurance_id)}}
                    {{Form::bsText('insurance_no', 'Insurance UUID', 'formData', $model->insurance_no)}}
                    {{Form::bsText('insurance_type', 'Insurance type', 'formData', $model->insurance_type)}}
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
                    {{Form::bsText('street', 'Stree')}}
                    {{Form::bsText('no', 'No')}}
                    {{Form::bsText('zipcode', 'Zipcode')}}
                    {{Form::bsText('city', 'City')}}
                    {{Form::bsText('phone', 'Phone')}}
                    {{Form::bsText('mobile', 'Mobile')}}
                    {{Form::bsText('email', 'E-Mail')}}
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
    {{Form::close()}}
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