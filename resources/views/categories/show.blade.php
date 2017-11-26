@extends('main')

@section('title', '| All Categories')

@section('content')

<section class="section container">

	<h1 class="is-size-2">Category: {{ $category->name }} <small class="has-text-primary">{{ $category->posts()->count() }} Posts</small></h1>

	<div class="columns">
		<div class="column is-8">
			<table class="table is-fullwidth">
				<thead>
					<tr>
						<th>#</th>
						<th>Post Title</th>
						<th>Action</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					@foreach($category->posts as $post)
					<tr>
						<th>{{ $post->id }}</th>
						<td>{{ $post->title }}</td>
						<td>
							<a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-xs">View</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		
		<div class="column  is-offset-1">
			<div class="box">
				<a href="{{ route('categories.edit', $category->id) }}" class="button is-success is-fullwidth m-t-20">Edit</a>
				{{ Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) }}
					{{ Form::submit('Delete', ['class' => 'button is-danger is-fullwidth m-t-20']) }}
				{{ Form::close() }}
			</div>
		</div>
	</div>

</section>

@endsection