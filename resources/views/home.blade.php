@extends('main')

@section('content')

<section class="section container">
	<div class="columns">
		<div class="column is-6">
			<div class="panel panel-default">
				<div class="panel-heading">Dashboard</div>

				<div class="panel-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

					You are logged in!
				</div>
			</div>
		</div>
	</div>
</section>

@endsection