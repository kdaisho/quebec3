@extends('main')

@section('title', '| Edit Comemnt')

@section('content')

<section class="section container">
	<h1 class="is-size-1 is-size-3-mobile">Edit Comment</h1>

	<div class="columns m-t-20">
		<div class="column is-6">

			{{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT', 'class' => 'form']) }}

				{{ Form::label('name', 'Name:', ['class' => 'label']) }}
				{{ Form::text('name', null, ['class' => 'input', 'disabled' => '']) }}

				{{ Form::label('email', 'Email:', ['class' => 'label']) }}
				{{ Form::text('email', null, ['class' => 'input', 'disabled' => '']) }}

				{{ Form::label('comment', 'Comment:', ['class' => 'label']) }}
				{{ Form::textarea('comment', null, ['class' => 'textarea']) }}

				{{ Form::submit('Update Comment', ['class' => 'button is-success is-fullwidth m-t-20']) }}

			{{ Form::close()}}

		</div>
	</div>
	{{-- </div> --}}

</section>
@endsection