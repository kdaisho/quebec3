@extends('main')

@section('title', '| Blog')

@section('content')

<div class="section is-hero-gen">
	<div class="container is-widescreen">
		<h1 class="title is-size-1 is-size-3-mobile">ブログ一覧</h1>
	</div>
</div>

<div class="section container is-widescreen">
	<div class="columns">
		<div class="column is-9 is-12-mobile m-b-30">
		@foreach($posts as $post)
			@if($post->is_online)
				<article class="media">
					<figure class="media-left">
						<p class="image is-200x200 m-b-15">
							@if(isset($post->image))
								<img src="images/{{ $post->image }}-thumb.jpg" alt="Featured image: {{ $post->title }}">
							@else
								<img src="http://imgsv.imaging.nikon.com/lineup/lens/zoom/normalzoom/af-s_nikkor28-300mmf_35-56gd_ed_vr/img/sample/sample4_l.jpg" alt="featured image: general">
							@endif
						</p>
					</figure>

					<div class="media-content">
						<div class="content">
							<h3>{{ $post->title }}</h3>
							<h5>{{ date('M j, Y', strtotime($post->created_at)) }}</h5>
							<p>{!! mb_substr(strip_tags($post->body), 0, 200) !!}{{ mb_strlen($post->body) > 200 ? '...' : '' }}</p>
							<a href="{{ route('blog.single', $post->slug) }}" class="button is-primary">続きを読む</a>
						</div>
					</div>
				</article>
			@endif
		@endforeach
		</div>

		<div class="column">
			<div class="box is-bg-quebec3">
				{{-- Signup Form --}}
				@include('partials.signup')
			</div>
		</div>
	</div>
</div>

<nav class="section pagination" role="navigation" aria-label="pagination">
	{{ $posts->links() }}
</nav>

@endsection