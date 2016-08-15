@extends('core::resourcefull.edit')

@section('content-start')
    @if (isset($create))
        {{ Form::model($model, array('route' => array('insurance.store'), 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true)) }}
    @else
        {{ Form::model($model, array('route' => array('insurance.update', $model->id), 'method' => 'PUT', 'class' => 'form-horizontal', 'files' => true)) }}
    @endif
@endsection


@section('content')
    <div class="container">
        @if (!isset($create))
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
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">General Data</h3>
                    </div>
                    <div class="box-body">
                        {{Form::itext('Title', 'title')}}
                        {{Form::itext('Website', 'homepage')}}
                        {{Form::itext('Region', 'region')}}
                        {{Form::itext('Rate', 'rate')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{Form::close()}}
@endsection

@push('document-ready-stack')
$('#task-body').slimScroll({
height: '250px'
});
@endpush