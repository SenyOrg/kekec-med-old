{{--
    Generic show template
--}}

@extends($vc->getTheme())

@section('head-buttons')
    <li>
        {{Form::open(['route' => $vc->controller()->getDeleteButtonRoute(), 'method' => 'destroy', 'class' => 'form-inline'])}}
        <a href="#"
           class="btn btn-danger"
           id="deletePatient"
           data-confirmation-callback="function (element) { $(element).closest('form').submit(); }"
           onClick="showDeleteDialog('Are you sure?', 'After removing the patient you are not able to restore related data', this)"
           data-body="Do yo want to delete the patient?">
            <i class="fa fa-trash"></i> Delete
        </a>
        <a
                href="{{$vc->controller()->getEditButtonRoute()}}"
                id="edit-button"
                class="btn btn-primary">
            <i class="fa fa-pencil"></i>
            Edit
        </a>
        {{Form::close()}}
    </li>
@endsection