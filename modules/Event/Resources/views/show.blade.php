@extends('core::resourcefull.show')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-1">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">General Data</h3>
				</div>
				<div class="box-body no-padding">
					<table class="table table-striped">
						<tbody>
							<tr>
								<th>Calendar</th>
								<td>{{$model->calendar->title}}</td>
							</tr>
							<tr>
								<th>Title</th>
								<td>{{$model->title}}</td>
							</tr>
							<tr>
								<th>Description</th>
								<td>{{$model->description}}</td>
							</tr>
							<tr>
								<th>Start</th>
								<td>{{$model->start}}</td>
							</tr>
							<tr>
								<th>End</th>
								<td>{{$model->end}}</td>
							</tr>
							<tr>
								<th>Status</th>
								<td><span class="label label-success" style="background-color: {{$model->status()->first()->color}} !important">
										{{$model->status->title}}
									</span></td>
							</tr>
							<tr>
								<th>Type</th>
								<td>
									<span class="label label-success" style="background-color: {{$model->type()->first()->color}} !important">
										{{$model->type->title}}
									</span>
								</td>
							</tr>
							<tr>
								<th>Patient</th>
								<td>{{$model->patient->getFullName()}}</td>
							</tr>
							<tr>
								<th>Participants</th>
								<td>
									@foreach($model->participants()->get() as $participant)
										<span class="label label-default">{{$participant->participant->getFullName()}}</span>
									@endforeach
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

@stop