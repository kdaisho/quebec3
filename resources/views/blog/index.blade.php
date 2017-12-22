@extends('main')

@section('title', '| Blog')

@section('content')

<section class="is-blog-index">

	<div class="section is-bg-purple has-text-centered">
		<div class="container is-widescreen">
			<h1 class="title is-size-1 is-size-3-mobile has-text-white">ブログ一覧</h1>
			<p class="has-text-white has-text-centered is-size-5 is-size-6-mobile text-bg">new! 記事にコメントを残せるようになりました。<span class="no-wrap">熱心な読者様向けに</span><span class="no-wrap">新着記事通知サービスも</span>やってます。</p>
		</div>
	</div>

	<div class="section container is-widescreen">
		<div class="columns">
			<div class="column no-side-pad is-9 is-12-mobile m-b-30">
			@foreach($posts as $post)
				@if($post->is_online)

					@if($post->id % 4 == 0 )
						{{-- in-feed ads --}}
						@include('partials._ads-infeed')
					@endif

					<article class="media">
						<figure class="media-left">
							<p class="image is-64x64 m-b-15">
								<img src="images/{{ $post->image ? $post->slug . '/' . $post->image . '-thumb.jpg' : 'default-thumb.opt.svg'}}" alt="{{ $post->image ? $post->title : 'Quebec3 logo' }}">
							</p>
						</figure>

						<div class="media-content">
							<div class="content">
								<h3 class="m-b-5 is-size-4 is-size-5-mobile">{{ $post->title }}</h3>
								<p class="has-text-weight-light is-size-6 is-size-7-mobile m-b-5">{{ date('Y年 n月j日',  strtotime($post->created_at)) }}</p>
								<p>{{ mb_substr(strip_tags($post->body), 0, 80) }}{{ mb_strlen($post->body) > 80 ? '...' : '' }}</p>
								<a href="{{ route('blog.single', $post->slug) }}" class="button is-primary">続きを読む</a>
							</div>
						</div>
					</article>
				@endif
			@endforeach
			</div>

			<div class="column">
				{{-- Signup Form --}}
				@include('partials._signup')
			</div>
		</div>
	</div>

	<nav class="pagination" role="navigation" aria-label="pagination">
		{{ $posts->links() }}
	</nav>

</section>

@endsection