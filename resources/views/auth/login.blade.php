@extends('layout/login')

@section('content')
@include('errors/message')
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						{!! csrf_field() !!}

					  <h1>Login Form</h1>
					  <div>
					  	<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address">
					  </div>
					  <div>
					  	<input type="password" name="password" class="form-control" placeholder="Password" required="" />
					  </div>
						<div class="pull-left">
							<input type="checkbox" name="remember"> Remember Me
						</div>
						<div class="clearfix"></div><br/>
						<div class="">
							<button type="submit" class="btn btn-primary">Login</button>
					    <a href="{{url('forgotPassword')}}">Lupa password ?</a>
					  </div>
					  <div class="clearfix"></div>
					  <div class="separator">

					  	<p class="change_link">New to site?
					    <a href="{{url('auth/register')}}">Sign up</a>
					    </p>
					    <div class="clearfix"></div>
					    <br />
					  	<div>
					  		<p>©2015 All Rights Reserved.</p>
					    </div>
					  </div>
					</form>

@endsection
