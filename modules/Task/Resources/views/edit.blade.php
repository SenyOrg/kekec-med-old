@extends('core::resourcefull.edit')

@section('content-start')
    @if (isset($create))
        {{ Form::model($model, array('route' => array('task.store'), 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true)) }}
    @else
        {{ Form::model($model, array('route' => array('task.update', $model->id), 'method' => 'PUT', 'class' => 'form-horizontal', 'files' => true)) }}
    @endif
@endsection


@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">General Data</h3>
                </div>
                <div class="box-body">
                    {{Form::itext('Title', 'title') }}
                    {{Form::itext('Description', 'description')}}
                    {{Form::idate('Deadline', 'deadline')}}
                    {{Form::itext('Done', 'done')}}
                    {{Form::iselect2('Creator', 'creator_id', \App\User::class, $model->creator_id)}}
                    {{Form::iselect2('Assignee', 'assignee_id', \App\User::class, $model->assignee_id)}}
                    {{Form::iselect2('Patient', 'object_id', \KekecMed\Patient\Entities\Patient::class, $model->object_id)}}
                </div>
            </div>
        </div>
    </div>
    {{Form::close()}}
@endsection
