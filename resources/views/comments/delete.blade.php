@extends('main')

@section('title', '| DELETE COMEMNT')

@section('content')

<section class="section container">
	<div class="columns">
		<div class="column is-9">

			<h1 class="is-size-1 is-size-3-mobile">DELETE THIS COMMENT?</h1>
			<p class="is-size-5">
				<strong>Name:</strong> {{ $comment->name }}<br>
				<strong>Email:</strong> {{ $comment->email }}<br>
				<strong>Comment:</strong> {{ $comment->comment }}
			</p>

			{{ Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) }}
				{{ Form::submit('YES DELETE THIS COMMENT', ['class' => 'button is-danger is-fullwidth m-t-20']) }}
			{{ Form::close() }}

		</div>
	</div>
</section>
@endsection