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
						<th>Title</th>
						<th>Category</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					@foreach($category->posts as $post)
					<tr>
						<th>{{ $post->id }}</th>
						<td>{{ $post->title }}</td>
						<td>@foreach($post->tags as $category)
							<span class="label label-default">{{ $category->name }}</span>
							@endforeach
						</td>
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
				{{-- <div class="column"> --}}
					<a href="{{ route('tags.edit', $category->id) }}" class="button is-success is-fullwidth m-t-20">Edit</a>
				{{-- </div> --}}
				{{-- <div class="column"> --}}
					{{ Form::open(['route' => ['tags.destroy', $category->id], 'method' => 'DELETE']) }}
						{{ Form::submit('Delete', ['class' => 'button is-danger is-fullwidth m-t-20']) }}
					{{ Form::close() }}
				{{-- </div> --}}
			</div>
		</div>
	</div>

</section>

@endsection