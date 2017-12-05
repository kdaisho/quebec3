@extends('main')

<?php $titleTag = htmlspecialchars($tag->name); ?>

@section('title', "| $titleTag")

@section('content')

<section class="section">

	<div class="container has-text-centered">
			<div>
				<h1 class="title is-size-1 is-size-3-mobile">{{ $tag->name }} Tag <small>{{ $tag->posts()->count() }} Posts</small></h1>
			</div>
			<div class="columns m-t-20">
				<a href="{{ route('tags.edit', $tag->id) }}" class="button is-primary m-r-5">Edit</a>
				{{ Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) }}
					{{ Form::submit('Delete', ['class' => 'button is-danger m-l-5']) }}
				{{ Form::close() }}
			</div>
		</div>
	</div>

	<div class="container column is-8 is-offset-2">
		<table class="table is-fullwidth">
			<thead>
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>Tags</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody>
				@foreach($tag->posts as $post)
				<tr>
					<th>{{ $post->id }}</th>
					<td>{{ $post->title }}</td>
					<td>@foreach($post->tags as $tag)
						<span class="label label-default">{{ $tag->name }}</span>
						@endforeach
					</td>
					<td>
						<a href="{{ route('posts.show', $post->id) }}" class="button">View Post</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

</section>

@endsection