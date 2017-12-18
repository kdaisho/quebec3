@extends('main')

@section('title', '| View Post')

@section('content')

<div class="section container is-blog-show">
	<div class="columns">

		<div class="column no-side-pad is-6">
			@if(isset($post->image))
				<img src="{{ asset('images/' . $post->slug . '/' . $post->image) }}-original.jpg" alt="Featured Image: {{ $post->title }}">
			@endif
			<h1 class="title is-size-1 is-size-3-mobile m-t-20">{{ $post->title }}</h1>
			<div class="blog-body">
				{!! $post->body !!}
			</div>

			<hr>
			<div class="tags">
				@foreach($post->tags as $tag)
					<span class="tag is-success">{{ $tag->name }}</span>
				@endforeach
			</div>

			<div class="m-t-50">
				<h3 class="is-size-4">Comments <span class="has-text-weight-bold">{{ $post->comments()->count() }}</span></h3>

				<table class="table m-t-20 is-fullwidth">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Comment</th>
							<th style="width: 113px;"></th>
						</tr>
					</thead>

					<tbody>
						@foreach($post->comments as $comment)
						<tr>
							<td>
								@if(isset($comment->name))
									{{ $comment->name }}
								@else
									名無しさん
								@endif
							</td>
							<td>{{ $comment->email }}</td>
							<td>{{ $comment->comment }}</td>
							<td>
								<a href="{{ route('comments.edit', $comment->id) }}" class="button is-primary">
									<span class="icon">
										<i class="fa fa-pencil"></i>
									</span>
								</a>
								<a href="{{ route('comments.delete', $comment->id) }}" class="button is-danger m-l-10">
									<span class="icon">
										<i class="fa fa-trash"></i>
									</span>
								</a>
							</td>
						</tr>

						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		<div class="column no-side-pad is-3 is-offset-1">
			<div class="box">
				<dl style="overflow-x: scroll;">
					<label>URL:</label>
					<p><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></p>
				</dl>
				<dl>
					<label>Category:</label>
					<p>{{ $post->category->name }}</p>
				</dl>
				<dl>
					<label>Created At:</label>
					<p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
				</dl>
				<dl>
					<label>Last Updated:</label>
					<p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
				</dl>
				<hr>

				{!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'button is-primary is-fullwidth')) !!}

				{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

					{!! Form::submit('Delete', ['class' => 'button is-danger is-fullwidth m-t-20', 'id' => 'deleteButton', 'disabled']) !!}

				{!! Form::close() !!}

				{{ Html::linkRoute('posts.index', '<< See All Posts', [], ['class' => 'button is-fullwidth m-t-20']) }}

				<div class="m-t-20">
					<input id="unlock" type="checkbox" class="is-danger m-r-5">
					<label for="unlock" class="checkbox">Unlock to delete</label>
				</div>
			</div>
		</div>

	</div> <!-- end of .column -->

</div>

<script>
(function() {
	var unlock = document.getElementById("unlock"),
		deleteButton = document.getElementById("deleteButton");
	unlock.addEventListener("change", function() {
		if(unlock.checked) {
			deleteButton.removeAttribute('disabled');
		}
		else {
			deleteButton.setAttribute('disabled', false);
		}
	}, false);
}());
</script>

@endsection