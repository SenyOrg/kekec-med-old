@extends('core::resourcefull.edit')

@section('content-start')
    @if (isset($create))
        {{ Form::model($model, array('route' => array('notice.store'), 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true)) }}
    @else
        {{ Form::model($model, array('route' => array('notice.update', $model->id), 'method' => 'PUT', 'class' => 'form-horizontal', 'files' => true)) }}
    @endif
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">General Data</h3>
                </div>
                <div class="box-body">
                    {{$model->getPresenter()->getTitle()}}
                    {{$model->getPresenter()->getCreator()}}
                    {{$model->getPresenter()->getObject(request('object'))}}
                    {{$model->getPresenter()->getBody()}}
                </div>
            </div>
        </div>
    </div>
    {{Form::close()}}
@endsection
