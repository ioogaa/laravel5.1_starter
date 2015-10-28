@extends('layout/login')

@section('content')
@include('errors/message')
					<form class="form-horizontal" role="form" method="POST" action="{{ url('forgotPassword') }}">
						{!! csrf_field() !!}
						<h1>Forgot Password</h1>
						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-8">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-8 col-md-offset-4">
								<button type="submit" class="btn btn-primary btn-sm">
									Send Password Reset Link
								</button><br/>
								<a href="{{url('auth/login')}}">Sudah ingat password ?</a>
							</div>
						</div>
					</form>
@endsection
