@extends('auth.templatea')
@section('content')
<!-- resources/views/auth/reset.blade.php -->

<!-- resources/views/auth/password.blade.php -->
<div class="login-box">
	<div class="login-logo">
		<a href="/auth/login"><i class="fa fa-fw fa-check-square-o"></i><b>Lara</b>APP</a>
	</div><!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg">{{ trans('passwords.title_pw_new') }}</p>
		<form method="POST" action="/password/reset">
			{!! csrf_field() !!}
			<input type="hidden" name="token" value="{{ $token }}">
			
			<div class="form-group has-feedback">
				<input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
  				   

			<div class="col-xs-6">
				<button type="submit" class="btn btn-primary btn-block btn-flat">Set new password</button>
			</div>
		</form>



		<a href="/">Zurück zum Login</a><br>
        

	</div><!-- /.login-box-body -->
</div><!-- /.login-box -->

@endsection




