@if (Session::has('success'))
<div class="container">
	<div class="message is-success" role="alert">
		<div class="message-header">
			<p>Success:</p>
			<button class="delete" aria-label="delete"></button>
		</div>
		<div class="message-body">
			{{ Session::get('success') }}
		</div>
	</div>
</div>
@endif

@if (count($errors) > 0)
<div class="container">
	<div class="message is-danger" role="alert">
		<div class="message-header">
			<p>Errors:</p>
			<button class="delete" aria-label="delete"></button>
		</div>
		<div class="message-body">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>		
	</div>
</div>
@endif