@extends('main')

<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| $titleTag")

@section('content')

<section class="section">
	<div class="container">
		<div class="column has-offset-2" style="justify-content: center;">
			<img class="featured-image" src="{{ asset('images/' . $post->image) }}" alt="Featured Image">
			<h1 class="is-size-1">{{ $post->title }}</h1>
			@foreach($post->tags as $tag)
				<span class="tag is-success">{{ $tag->name }}</span>
			@endforeach
			<div class="m-t-30">
				{!! $post->body !!}
			</div>
			<hr>
			<p>Posted In: {{ $post->category->name }}</p>
		</div>
	</div>

	<div class="container m-to-50">
		<div class="column is-6 is-offset-3">
			<h3 class="is-size-3">
				<i class="fa fa-comments m-r-10"></i> {{ $post->comments()->count() }} Comments:
			</h3>
			@foreach($post->comments->reverse() as $comment)
				<div class="comment m-t-40">
					<div class="columns">
						<div class="column is-narrow">
							<img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid" }}" alt="commenter icon" class="author-image">
						</div>
						<div class="column">
							<h4 class="is-size-5">
								@if(isset($comment->name))
									{{ $comment->name }}
								@else
									名無しさん
								@endif
							</h4>
							<p class="has-text-weight-light">{{ date('F nS, Y - g:iA', strtotime($comment->created_at)) }}</p>
						</div>
					</div>
					<div class="comment-content">
						{{ $comment->comment }}
					</div>
					<hr>
				</div>
			@endforeach
		</div>
	</div>

	<div class="container m-t-50">
		{{-- <div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;"> --}}
			{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST', 'class' => 'form']) }}
				<div class="column is-6 is-offset-3">
					{{ Form::label('name', 'Name:', ['class' => 'label m-t-20']) }}
					<div class="control has-icons-left">
						{{ Form::text('name', null, ['class' => 'input', 'placeholder' => '気が進まなきゃ空欄で。']) }}
						<span class="icon is-small is-left">
							<i class="fa fa-user"></i>
						</span>
					</div>

					{{ Form::label('email', 'Email:', ['class' => 'label m-t-20']) }}
					<div class="control has-icons-left">
						{{ Form::text('email', null, ['class' => 'input', 'required', 'placeholder' => 'Emailは必須。別に何かするわけじゃないけど。']) }}
						<span class="icon is-small is-left">
							<i class="fa fa-envelope"></i>
						</span>
					</div>

					<div class="control has-icons-left">
						{{ Form::label('comment', 'Comment:', ['class' => 'label m-t-20']) }}
						{{ Form::textarea('comment', null, ['class' => 'textarea', 'rows' => '5', 'placeholder' => 'コメントは必須だよ。', 'required']) }}

						{{ Form::submit('Add comment', ['class' => 'button is-success m-t-30 is-fullwidth'])}}
					</div>
				</div>
			{{ Form::close() }}
		{{-- </div> --}}
	</div>
</section>
@endsection