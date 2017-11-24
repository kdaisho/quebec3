@extends('main')

@section('title', '| Blog')

@section('content')

<div class="section is-blog">
	<div class="container is-widescreen">
		<h1 class="is-size-1">Blog</h1>
	</div>
</div>

<div class="section container is-widescreen">
	<div class="columns">
		<div class="column">
		@foreach($posts as $post)
			@if($post->is_online)
				<article class="media">
					<figure class="media-left">
						<p class="image is-128x128">
							@if(isset($post->image))
								<img src="images/{{ $post->image }}" alt="Featured image: {{ $post->title }}">
							@else
								<img src="http://imgsv.imaging.nikon.com/lineup/lens/zoom/normalzoom/af-s_nikkor28-300mmf_35-56gd_ed_vr/img/sample/sample4_l.jpg" alt="featured image: general">
							@endif
						</p>
					</figure>

					<div class="media-content">
						<div class="content">
							<h3>{{ $post->title }}</h3>
							<h5>Published: {{ date('M j, Y', strtotime($post->created_at)) }}</h5>
							<p>{!! mb_substr(strip_tags($post->body), 0, 200) !!}{{ mb_strlen($post->body) > 200 ? '...' : '' }}</p>
							<a href="{{ route('blog.single', $post->slug) }}" class="button is-primary">Read More</a>
						</div>
					</div>
				</article>
			@endif
		@endforeach
		</div>
	</div>
</div>

<nav class="section pagination" role="navigation" aria-label="pagination">


	{{ $posts->links() }}
</nav>

@endsection