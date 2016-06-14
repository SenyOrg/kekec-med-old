@extends('core::resourcefull.edit')

@section('content-start')
    @if (isset($create))
        {{ Form::model($model, array('route' => array('event.store'), 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true)) }}
    @else
        {{ Form::model($model, array('route' => array('event.update', $model->id), 'method' => 'PUT', 'class' => 'form-horizontal', 'files' => true)) }}
    @endif
@endsection

@section('content')
    <div class="box">
        <div class="box-header">

        </div>
        <div class="box-body">
            {{Form::iselectbox('Calendar', 'calendar_id', \KekecMed\Calendar\Entities\Calendar::class)}}
            {{Form::itext('Title', 'title')}}
            {{Form::itext('Description', 'description')}}
            {{Form::idate('Start', 'start')}}
            {{Form::idate('End', 'end')}}
            {{Form::iselect2('Status', 'event_status_id', \KekecMed\Event\Entities\EventStatus::class)}}
            {{Form::iradio('Type', 'event_type_id', \KekecMed\Event\Entities\EventType::class)}}
            {{Form::iselect2('Patient', 'patient_id', \KekecMed\Patient\Entities\Patient::class)}}
            {{Form::imultiselect('Participants', 'participants', \App\User::class, $model->participants()->get()->map(function($participant) {
                return $participant->participant()->first()->id;
            })->toArray())}}

        </div>
    </div>
@endsection