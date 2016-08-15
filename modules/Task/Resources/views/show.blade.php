@extends('core::resourcefull.show')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">General Data</h3>
                </div>
                <div class="box-body no-padding">
                    <form class="form-horizontal">
                        {{$model->getPresenter()->setViewMode('view')}}
                        {{$model->getPresenter()->getTitle()}}
                        {{$model->getPresenter()->getDescription()}}
                        {{$model->getPresenter()->getDeadline()}}
                        {{$model->getPresenter()->getDone()}}
                        {{$model->getPresenter()->getCreator()}}
                        {{$model->getPresenter()->getAssignee()}}
                        {{$model->getPresenter()->getObject()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
