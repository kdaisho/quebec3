@extends('main')

@section('title', '| All Comments')

@section('content')

<section class="section container">

	<h1 class="is-size-1 is-size-3-mobile">Comments</h1>

	<div class="columns m-t-20">
		<div class="column" style="overflow-x: scroll;">

			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th style="min-width: 180px;">Post Title</th>
						<th>Posted at</th>
						<th>Body</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($comments->reverse() as $comment)
					<tr>
						<th>{{ $comment->id }}</th>
						<td>
							{{ $comment->name or '名無しさん' }}
						</td>
						<td>{{ $comment->email }}</td>
						<td><a href="{{ route('posts.show', $comment->post->id) }}">{{ $comment->post->title }}</a></td>
						<td>{{ date('F nS, Y g:iA', strtotime($comment->created_at)) }}</td>
						<td>{{ $comment->comment }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>

		</div> <!-- end of .column -->
	</div>

</section>
@endsection