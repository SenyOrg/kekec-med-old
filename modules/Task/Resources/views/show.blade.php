@extends('core::resourcefull.show')

@section('content')
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
                            <th>Description</th>
                            <td>{{$model->description}}</td>
                        </tr>
                        <tr>
                            <th>Deadline</th>
                            <td>{{$model->deadline}}</td>
                        </tr>
                        <tr>
                            <th>Done</th>
                            <td>{{$model->done}}</td>
                        </tr>
                        <tr>
                            <th>Creator</th>
                            <td>{{$model->creator()->first()->getFullName()}}</td>
                        </tr>
                        <tr>
                            <th>Assignee</th>
                            <td>{{$model->assignee()->first()->getFullName()}}</td>
                        </tr>
                        <tr>
                            <th>Patient</th>
                            <td>{{$model->object()->first()->getFullName()}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
