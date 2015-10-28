@extends('layout/login')

@section('content')
@include('errors/message')
					<form class="form" role="form" method="POST" action="{{ url('/auth/register') }}">
						{!! csrf_field() !!}
						<h1>Register</h1>
						<div class="form-group">
							<label class="control-label pull-left">Name</label>
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
						</div>

						<div class="form-group">
							<label class="pull-left control-label">E-Mail Address</label>
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
						</div>

						<div class="form-group">
							<label class="pull-left control-label">Password</label>
								<input type="password" class="form-control" name="password">
						</div>

						<div class="form-group">
							<label class="pull-left control-label">Confirm Password</label>
								<input type="password" class="form-control" name="password_confirmation">
						</div>

						<div class="form-group">
							<div class="col-md-12 text-center">
								<button type="submit" class="btn btn-primary btn-sm">
									Submit
								</button> or
                <a href="{{url('auth/login')}}">Already have an account!</a>
							</div>
						</div>
					</form>
@endsection
