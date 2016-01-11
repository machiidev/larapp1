@extends('auth.templatea')
@section('content')
<!-- resources/views/auth/password.blade.php -->
<div class="login-box">
	<div class="login-logo">
		<a href="/auth/login"><i class="fa fa-fw fa-check-square-o"></i><b>Lara</b>APP</a>
	</div><!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg">{{ trans('passwords.title_pw_reset') }}</p>
		<form method="POST" action="/password/email">
			{!! csrf_field() !!}

			<div class="form-group has-feedback">
				<input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
				   

			<div class="col-xs-6">
				<button type="submit" class="btn btn-primary btn-block btn-flat">Reset password</button>
			</div>
		</form>



		<a href="/">Zurück zum Login</a><br>
        

	</div><!-- /.login-box-body -->
</div><!-- /.login-box -->

@endsection