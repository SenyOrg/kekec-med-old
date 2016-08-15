@extends('core::resourcefull.show')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-aqua-active">
                        <h3 class="widget-user-username">#{{$model->id}} {{$model->title}}</h3>
                        <h5 class="widget-user-desc">Created at {{$model->created_at}}</h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle bg-aqua-active"
                             src="https://nordost.aok.de/typo3conf/ext/aok_site_de/Resources/Public/Images/Svg/logo-aok.svg"
                             alt="User Avatar">
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header"><i class="fa fa-phone fa-lg"></i></h5>
                                    <span class="description-text">{{$model->title}}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header"><i class="fa fa-mobile fa-lg"></i></h5>
                                    <span class="description-text">{{$model->title}}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header"><i class="fa fa-envelope"></i></h5>
                                    <span class="description-text">{{$model->title}}</span>
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
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">General Data</h3>
                    </div>
                    <div class="box-body no-padding">
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <th>Title</th>
                                <td>{{$model->title}}</td>
                            </tr>
                            <tr>
                                <th>Website</th>
                                <td>{{$model->homepage}}</td>
                            </tr>
                            <tr>
                                <th>Region</th>
                                <td>{{$model->region}}</td>
                            </tr>
                            <tr>
                                <th>Rate</th>
                                <td>{{$model->rate}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Members</h3>
                    </div>
                    <div class="box-body no-padding">
                        <table class="table table-striped table-responsive">
                            <tbody>
                            @foreach ($members as $member)
                                <tr>
                                    <td>
                                        <a href="{{route('patient.show', $member->id)}}">{{$member->getFullName()}}</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

