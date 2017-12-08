@extends('template.default')

@section('styles')
<style type="text/css">
	body{
		background: #34495e;
	}
	.well{
		
		border-radius: 10px;
	}
	span{
		margin-right: 5px;
		color: red;
	}
	p img {
		margin-top: 3%;
	}
</style>
@endsection


@section('contents')
	<p class="text-center"><img src="{{URL::to('images/logo.png')}}"></p>
	<div class="col-md-6 col-md-offset-3 well">
		<h2 class="text-center">STAFF LOGIN</h2>
		
		@if(Session::has('error'))
			<div class="alert alert-danger">
				{{Session::get('error')}}
			</div>
		@endif
		<form action="{{route('login_check')}}" method="POST">
			<div class="form-group {{$errors->has('username') ? 'has-error': ''}}">
				<label for="username">Username</label>
				<input type="text" name="username" class="form-control" id="username" max="12" >
				@if($errors->has('username'))
					<span class="help-block">{{$errors->first('username')}}</span>
				@endif
			</div>
			<div class="form-group {{$errors->has('password') ? 'has-error': ''}}">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control" id="password" max="12" >
				@if($errors->has('password'))
					<span class="help-block">{{$errors->first('password')}}</span>
				@endif
			</div>
			<div class="form-group">
				 {{csrf_field()}}
				 <button type="submit" class="btn btn-primary">Sign-In</button>
			</div>
		</form>
	</div>
@endsection


@section('scripts')

@endsection