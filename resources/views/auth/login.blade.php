@extends('main')

@section('content')

<section class="section container">

	<div class="columns">

		<div class="column is-6">

			<h1 class="is-size-1 is-size-3-mobile">Login<h1>

			<form class="form" method="POST" action="{{ route('login') }}">
				{{ csrf_field() }}

				<div class="{{ $errors->has('email') ? ' has-error' : '' }}">
					<label for="email" class="label m-t-20">E-Mail Address</label>
					<input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required autofocus>

					@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
				</div>

				<div class="{{ $errors->has('password') ? ' has-error' : '' }}">
					<label for="password" class="label m-t-20">Password</label>
					<input id="password" type="password" class="input" name="password" required>

					@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif
				</div>

				<div class="field m-t-20">
					<div class="control">
						<label class="checkbox">
							<input class="m-r-10" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
						</label>
					</div>
				</div>

				<div class="field m-t-20">
					<div class="control">
						<button type="submit" class="button is-primary">
							Login
						</button>

						{{-- <a class="button" href="{{ route('password.request') }}">
							Forgot Your Password?
						</a> --}}
					</div>
				</div>
			</form>

		</div> <!-- end of .column -->

	</div> <!-- end of .columns -->

</section>

@endsection