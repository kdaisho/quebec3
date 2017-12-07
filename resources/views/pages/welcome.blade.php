@extends('main')

@section('title', '| Homepage')

@section('content')

{{-- <div class="heroer" style="background: blue url('../images/quebec3-hero.jpg') no-repeat center;"> --}}
<div class="hero">
	<div class="hero-body">
		<div class="container is-widescreen has-text-centered">
			<h1 class="has-text-white title is-size-1 m-b-30">Quebec3</h1>
			<p class="subtitle has-text-white">- 海外移住ポータル -</p>
			<a class="button is-primary is-medium" href="{{ route('blog.index') }}" role="button">記事一覧</a>
		</div>
	</div>
</div>

<div class="is-size-6 column is-6-desktop is-offset-3-desktop is-10-tablet is-offset-1-tablet has-text-centered m-t-10">
	<p>
		Quebec3は、モントリオール在住のとある日本人により運営されている気ままな個人のブログです。モントリオール/ケベック州での生活ぶりを勝手な視点から書いています。
	</p>
	<p>
		このブログには将来海外に住んでみたいと思っている人、留学を考えている人、または日本の労働環境があまりに劣悪なため日本脱出を考えている人のモチベーションを向上させる効果があります。
	</p>
	<p>
		これまで日本だけでずーっと過ごして来た人、英語を勉強している人、ポテチの袋が上手に開けられない人、皆で仲良くQuebec3を読んでカナダ移住を追体験してください。
	</p>
</div>

<div class="section container">
	
	<h2 class="title is-size-2 is-size-3-mobile has-text-centered m-b-50">最近の記事</h2>
	<div class="columns">
		<div class="column is-12-mobile m-b-30">
			@foreach($posts as $post)
				@if($post->is_online)
					<article class="media">
						<figure class="media-left">
							<span class="image is-128x128">
								@if(isset($post->image))
									<img src="/images/{{ $post->image }}-thumb.jpg" alt="Featured image: {{ $post->title }}">
								@else
									<img src="/images/profile.jpg" alt="featured image: general">
								@endif
							</span>
						</figure>

						<div class="media-content">
							<div class="content">
								<h3 class="is-size-3 is-size-4-mobile">{{ $post->title }}</h3>
								<small class="has-text-weight-light">{{ date('Y年 m月d日',  strtotime($post->created_at)) }}</small>
								<p>{!! mb_substr(strip_tags($post->body), 0, 200) !!}{{ mb_strlen($post->body) > 200 ? '...' : '' }}</p>
								<a href="{{ route('blog.single', $post->slug) }}" class="button is-primary">続きを読む</a>
							</div>
						</div>
					</article>
				@endif
			@endforeach

			<hr>
			<a class="button is-primary is-fullwidth m-t-30" href="{{ route('blog.index') }}" role="button">記事一覧へ</a>
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
						<h3 class="is-size-4">Kyoshin</h3>
						<p>2010年より<span class="no-wrap">モントリオール</span>在住の<span class="no-wrap">カナダ市民権</span><span class="no-wrap">保持者。</span><br>元陸自の<span class="no-wrap">Web屋</span><span class="no-wrap">さん。</span><br>カレー好き。</p>
						<a href="{{ url('about') }}" class="button is-primary">詳しく見る</a>
					</div>
				</div>
			</div>
		</div>
		
	</div><!-- End of .columns -->

	<hr>

	{{-- <div class="m-t-50 columns"> --}}
	<div class="m-t-50">
		{{-- <div class="is-8 is-offset-2"> --}}
		<div class="column is-6-desktop is-offset-3-desktop is-10-tablet is-offset-1-tablet">
			@include('partials._form')
		</div>
	</div>
</div>

@endsection