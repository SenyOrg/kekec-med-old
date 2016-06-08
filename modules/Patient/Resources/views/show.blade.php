@extends($vc->getTheme())

@section('head-buttons')
    <li>
    <a href="#" class="btn btn-danger" id="deletePatient" data-toggle="modal" data-target="#deleteModal" data-title="Are you sure?" data-body="Do yo want to delete the patient?"><i class="fa fa-trash"></i> Delete</a>
    <a href="{{route('patient.edit', ['id' => $model->id])}}" class="btn  btn-primary"><i class="fa fa-pencil"></i> Edit</a>
    </li>
@endsection

@section('content')
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
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">General Data</h3>
                </div>
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th>Firstname</th>
                            <td>{{$model->firstname}}</td>
                        </tr>
                        <tr>
                            <th>Lastname</th>
                            <td>{{$model->lastname}}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>@if ($model->gender == 'm') <i class="fa fa-male"></i> Male @else <i
                                        class="fa fa-female"></i> Female @endif</td>
                        </tr>
                        <tr>
                            <th>Birthdate</th>
                            <td>{{$model->birthdate}}</td>
                        </tr>
                        </tbody>
                    </table>
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
                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <li><a href="#">Insurance-ID <span
                                        class="pull-right badge bg-blue">{{$model->insurance_no}}</span></a></li>
                        <li><a href="#">Type <span
                                        class="pull-right badge bg-aqua">{{$model->insurance_type}}</span></a></li>
                    </ul>
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
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <tbody>
                        <tr>
                            <th>Adress</th>
                            <td>
                                <address>
                                    <strong>{{$model->getFullName()}}</strong><br>
                                    {{$model->street}} {{$model->no}}<br>
                                    {{$model->zipcode}} {{$model->city}}<br>
                                    Deutschland
                                </address>
                            </td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{$model->phone}}</td>
                        </tr>
                        <tr>
                            <th>Mobile</th>
                            <td>{{$model->mobile}}</td>
                        </tr>
                        <tr>
                            <th>E-Mail</th>
                            <td>{{$model->email}}</td>
                        </tr>
                        </tbody>
                    </table>
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
                                <small class="label label-danger"><i class="fa fa-user fa-lg"></i> {{$task->creator->getFullname()}}</small>
                                &nbsp;&nbsp;>&nbsp;&nbsp;
                                <small class="label label-info"><i class="fa fa-user fa-lg"></i> {{$task->assignee->getFullname()}}</small>
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
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#task-body').slimScroll({
                height: '250px'
            });

            $('#deletePatient').data('deleteAction', function() {
                        var form = $('#generalForm');
                        var method = $('#generalFormMethod');
                        form.attr('action', '{{route('patient.destroy', ['id' => $model->id])}}');
                        method.val('DELETE');
                        form.submit();
            });
        })
    </script>
@endsection