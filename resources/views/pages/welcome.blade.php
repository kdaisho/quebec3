@extends('main')

@section('title', '| Homepage')

@section('content')

{{-- <div class="row"> --}}
<div class="hero">
	<div class="hero-body">
		<div class="container">
			<h1 class="title">Welcome to my blog 3</h1>
			<p class="subtitle">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or 
			<p class="subtitle">
				<a class="button is-primary" href="#" role="button">Poplar posts</a>
			</p>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8">

		@foreach($posts as $post)
			@if($post->is_online)

				<div class="post">
					<h3>{{ $post->title }}</h3>
					<h3>{{ $post->is_online }}</h3>
					<p>{!! mb_substr(strip_tags($post->body), 0, 200) !!}{{ mb_strlen($post->body) > 200 ? '...' : '' }}</p>
					<a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
				</div>

				<hr>

			@endif
		@endforeach
	</div>
	<div class="col-md-3 col-md-offset-1">
		<div class="post">
			<h2>Sidebar</h2>
		</div>
	</div>
</div>

@endsection