@extends('main')

@section('title', '| Homepage')

@section('content')

{{-- <div class="heroer" style="background: blue url('../images/quebec3-hero.jpg') no-repeat center;"> --}}
<div class="hero">
	<div class="hero-body">
		<div class="container is-widescreen has-text-centered">
			<h1 class="has-text-white title is-size-1 m-b-30">Quebec3</h1>
			<p class="subtitle has-text-white">- 海外移住ポータル -</p>
			<p class="subtitle">
				<a class="button is-primary" href="#" role="button">全記事見る</a>
			</p>
		</div>
	</div>
</div>

<div class="section container">
	<div class="columns">

		<div class="column is-12-mobile m-b-30">
			@foreach($posts as $post)
				@if($post->is_online)
					<article class="media">
						<figure class="media-left">
							<span class="image is-128x128">
								@if(isset($post->image))
									<img src="/images/{{ $post->image }}" alt="Featured image: {{ $post->title }}">
								@else
									<img src="/images/profile.jpg" alt="featured image: general">
								@endif
							</span>
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

		<div class="column is-3" style="max-width: 256px;">
			<div class="card" >
				<div class="card-image">
					<figure class="image is-256x256">
						<img src="/images/profile-2.jpg" alt="Placeholder image">
					</figure>
				</div>
				<div class="card-content">
					<div class="media">
						<div class="media-content">
							<h2 class="title is-size-5">この人が<br>書いてます。</h2>
						</div>
					</div>
					<div class="content">
						<h3 class="is-size-4">Kyoshin-hei</h3>
						<p>2010年よりモントリオール在住のカナダ市民権保持者。<br>元陸自のWeb屋さん。<br>カレー好き。</p>
						<a href="{{ url('about') }}" class="button is-primary">About Me</a>
					</div>
				</div>
			</div>
		</div>

	</div><!-- End of .columns -->

	<div class="m-t-50">
		<h2 class="has-text-centered is-size-2 is-size-3">ご質問・ご意見あればどーぞ。</h2>
		@include('partials._form')
	</div>
</div>

@endsection