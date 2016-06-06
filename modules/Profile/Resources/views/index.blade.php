@extends($vc->getTheme())

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-widget widget-user">
					<!-- Add the bg color to the header using any of the bg-* classes -->
					<div class="widget-user-header bg-aqua-active">
						<h3 class="widget-user-username">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</h3>
						<h5 class="widget-user-desc">Founder &amp; CEO</h5>
					</div>
					<div class="widget-user-image">
						<img class="img-circle" src="{{Auth::user()->getImageUrl()}}" alt="User Avatar">
					</div>
					<div class="box-footer">
						<div class="row">
							<div class="col-sm-4 border-right">
								<div class="description-block">
									<h5 class="description-header">3,200</h5>
									<span class="description-text">SALES</span>
								</div>
								<!-- /.description-block -->
							</div>
							<!-- /.col -->
							<div class="col-sm-4 border-right">
								<div class="description-block">
									<h5 class="description-header">13,000</h5>
									<span class="description-text">FOLLOWERS</span>
								</div>
								<!-- /.description-block -->
							</div>
							<!-- /.col -->
							<div class="col-sm-4">
								<div class="description-block">
									<h5 class="description-header">35</h5>
									<span class="description-text">PRODUCTS</span>
								</div>
								<!-- /.description-block -->
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title">Profile</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
						</div>
						<!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<form class="form-horizontal" role="form" method="POST" action="{{ route('profile.update', [Auth::user()->id]) }}" enctype="multipart/form-data">
							{{ csrf_field() }}
							<input type="hidden" name="_method" value="PUT">

							<div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
								<label for="firstname" class="col-md-4 control-label">Firstname</label>

								<div class="col-md-6">
									<input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') ? old('firstname') : Auth::user()->firstname}}">

									@if ($errors->has('firstname'))
										<span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
								<label for="lastname" class="col-md-4 control-label">Lastname</label>

								<div class="col-md-6">
									<input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') ? old('lastname') : Auth::user()->lastname}}">

									@if ($errors->has('lastname'))
										<span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<label for="email" class="col-md-4 control-label">E-Mail Address</label>

								<div class="col-md-6">
									<input id="email" type="email" class="form-control" name="email" value="{{ old('email') ? old('email') : Auth::user()->email }}">

									@if ($errors->has('email'))
										<span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
								<label for="image" class="col-md-4 control-label">Profile image</label>

								<div class="col-md-6">
									<input id="image" type="file" class="form-control" name="image" value="{{ old('image')}}" accept="image/*">

									@if ($errors->has('image'))
										<span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
									@endif
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
										<i class="fa fa-btn fa-save"></i> Save
									</button>
								</div>
							</div>
						</form>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
			<div class="col-md-12">
				<div class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title">Password</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
						</div>
						<!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<form class="form-horizontal" role="form" method="POST" action="{{ route('profile.update', [Auth::user()->id]) }}?pass">
							{{ csrf_field() }}
							<input type="hidden" name="_method" value="PUT">


							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<label for="password" class="col-md-4 control-label">Password</label>

								<div class="col-md-6">
									<input id="password" type="password" class="form-control" name="password">

									@if ($errors->has('password'))
										<span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
									@endif
								</div>
							</div>

							<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
								<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

								<div class="col-md-6">
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation">

									@if ($errors->has('password_confirmation'))
										<span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
									@endif
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									<button type="submit" class="btn btn-primary">
										<i class="fa fa-btn fa-save"></i> Save
									</button>
								</div>
							</div>
						</form>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
		</div>
	</div>
@endsection
