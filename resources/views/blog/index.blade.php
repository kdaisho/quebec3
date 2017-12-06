@extends('main')

@section('title', '| Blog')

@section('content')

<div class="section is-hero-gen">
	<div class="container is-widescreen">
		<h1 class="title is-size-1 is-size-3-mobile">ブログ一覧</h1>
		<p class="has-text-white has-text-centered is-size-5 is-size-6-mobile text-bg">全ての記事がここに。熱心な読者様向けに新着記事通知サービスもやってます。</p>
	</div>
</div>

<div class="section container is-widescreen">
	<div class="columns">
		<div class="column is-9 is-12-mobile m-b-30">
		@foreach($posts as $post)
			@if($post->is_online)
				<article class="media">
					<figure class="media-left">
						<p class="image is-128x128 m-b-15">
							@if(isset($post->image))
								<img src="images/{{ $post->image }}-thumb.jpg" alt="Featured image: {{ $post->title }}">
							@else
								<img src="http://imgsv.imaging.nikon.com/lineup/lens/zoom/normalzoom/af-s_nikkor28-300mmf_35-56gd_ed_vr/img/sample/sample4_l.jpg" alt="featured image: general">
							@endif
						</p>
					</figure>

					<div class="media-content">
						<div class="content">
							<h3 class="m-b-5">{{ $post->title }}</h3>
							<p class="has-text-weight-light is-size-6 m-b-5">{{ date('Y年 m月d日',  strtotime($post->created_at)) }}</p>
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

<nav class="pagination" role="navigation" aria-label="pagination">
	{{ $posts->links() }}
</nav>

@endsection