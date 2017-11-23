@extends('main')

@section('title', '| Homepage')

@section('content')

{{-- <div class="row"> --}}
<div class="hero">
	<div class="hero-body">
		<div class="container is-widescreen">
			<h1 class="title">Welcome to my blog 3</h1>
			<p class="subtitle">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or 
			<p class="subtitle">
				<a class="button is-primary" href="#" role="button">Poplar posts</a>
			</p>
		</div>
	</div>
</div>

<div class="section container" style="background: yellow;">
	<div class="columns">

		<div class="column is-9 is-12-mobile">
			@foreach($posts as $post)
				@if($post->is_online)
					<article class="media">
						<figure class="media-left">
							<p class="image is-128x128">
								<img src="https://bulma.io/images/placeholders/128x128.png">
							</p>
						</figure>

						<div class="media-content">
							<div class="content">
								<h3>{{ $post->title }}</h3>
								<p>{!! mb_substr(strip_tags($post->body), 0, 200) !!}{{ mb_strlen($post->body) > 200 ? '...' : '' }}</p>
								<a href="{{ route('blog.single', $post->slug) }}" class="button is-primary">Read More</a>
							</div>
						</div>
					</article>
				@endif
			@endforeach
		</div>

		<div class="column is-3 is-6-mobile">
			<div class="card">
				<div class="card-image">
					<figure class="image is-4by3">
						<img src="https://bulma.io/images/placeholders/128x128.png" alt="Placeholder image">
					</figure>
				</div>
				<div class="card-content">
					<div class="media">
						<div class="media-content">
							<h3 class="title">This person writes.</h3>
						</div>
					</div>
					<div class="content">
						<p>blaf blah blah blaf blah blah blaf blah blah blaf blah blah blaf blah blah</p>
						<a href="{{ url('about') }}" class="button is-primary">About Kyoshin</a>
					</div>
				</div>
			</div>
		</div>

	</div><!-- End of .columns -->
</div>

{{-- <div class="section container is-widescreen">
	<div class="columns">
		@foreach($posts as $post)
		@if($post->is_online)
		<div class="column is-narro" style="flex-grow: 0;">
			<div class="card" style="max-width: 100%; width: 300px;">
				<div class="card-image">
					<figure class="image is-4by3">
						<img src="https://bulma.io/images/placeholders/128x128.png" alt="Placeholder image">
					</figure>
				</div>
				<div class="card-content">
					<div class="media">
						<div class="media-content">
							<h3 class="title is-4">{{ $post->title }}</h3>
						</div>
					</div>
					<div class="content">
						<p>{!! mb_substr(strip_tags($post->body), 0, 100) !!}{{ mb_strlen($post->body) > 100 ? '...' : '' }}</p>
						<a href="{{ route('blog.single', $post->slug) }}" class="button is-primary">Read More</a>
						<br>
						<time>{{ $post->created_at }}</time>
					</div>
				</div>
			</div>
		</div>
		@endif
		@endforeach
	</div>
</div> --}}

@endsection