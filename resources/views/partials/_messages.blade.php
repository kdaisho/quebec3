@if (Session::has('success'))
<?php $closeBtn = true; ?>
<div class="container message-container">
	<div class="message is-success" role="alert">
		<div class="message-header">
			<p>Success:</p>
			<button class="delete" onclick="closeMsg()" aria-label="delete"></button>
		</div>
		<div class="message-body">
			{{ Session::get('success') }}
		</div>
	</div>
</div>
@endif

@if (count($errors) > 0)
<div class="container message-container">
	<div class="message is-danger" role="alert">
		<div class="message-header">
			<p>Errors:</p>
			<button class="delete" onclick="closeMsg()" aria-label="delete"></button>
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


<script>
function closeMsg() {
var msgContainer = document.getElementsByClassName("message-container"),
	msg =  document.getElementsByClassName("message");
	msgContainer[0].removeChild(msg[0]);
}
</script>