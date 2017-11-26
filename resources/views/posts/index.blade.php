@extends('main')

@section('title', '|All Posts')

@section('content')

<div class="section container">

	<div class="columns">
		<h1 class="is-size-1 is-size-3-mobile column is-narrow">All Posts</h1>
		<div class="column is-full-mobile">
			<a href="{{ route('posts.create') }}" class="button is-primary m-t-20">Create New Post</a>
		</div>
	</div>

	<div style="overflow-x: scroll;">
		<table class="table is-fullwidth">
			<thead>
				<th>#</th>
				<th>Title</th>
				<th>Body</th>
				<th>Created At</th>
				<th></th>
			</thead>

			<tbody>
				@foreach($posts as $post)
					<tr>
						<th>{{ $post->id }}</th>
						<td>{{ $post->title }}</td>
						<td>{!! mb_substr(strip_tags($post->body), 0, 20) !!}{{ mb_strlen($post->body) > 20 ? '...' : '' }}</td>
						<td>{{ date('M j, Y ', strtotime($post->created_at)) }}</td>
						<td>
							<a href="{{ route('posts.show', $post->id) }}" class="button">View</a>
							<a href="{{ route('posts.edit', $post->id) }}" class="button">Edit</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<nav class="section pagination" role="navigation" aria-label="pagination">
		{!! $posts->links(); !!}
	</nav>

</div>
@endsection