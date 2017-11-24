@extends('main')

@section('title', '| Contact')

@section('content')

<div class="section container">

	<h1 class="is-size-1">Contact Us</h1>
	<p class="is-size-5">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>
	<hr>

	<form action="{{ url('contact') }}" method="POST" class="field column is-three-fifths is-offset-one-fifth">
		{{ csrf_field() }}

		<label for="email" name="email" class="label m-t-20">Email:</label>
		<div class="control has-icons-left">
			<input type="text" name="email" id="email" class="input" required>
			<span class="icon is-small is-left">
				<i class="fa fa-envelope"></i>
			</span>
		</div>

		<div class="control m-t-20">
			<label for="email" name="subject" class="label">Subject:</label>
			<input type="text" name="subject" id="subject" class="input" placeholder="Your subject here..." required>
		</div>


		<div class="control m-t-20">
			<label for="message" name="message" class="label">Message:</label>
			<textarea name="message" id="message" class="textarea" placeholder="Type your message here..." required></textarea>
		</div>

		<input type="submit" value="Send Message" class="m-t-20 button is-success">
	</form>
</div>

@endsection