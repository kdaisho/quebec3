@extends('main')

@section('title', '| Blog')

@section('content')

<div class="section is-blog">
	<div class="container is-widescreen">
		<h1 class="title is-size-1 is-size-3-mobile">Blog</h1>
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
								<img src="images/{{ $post->image }}" alt="Featured image: {{ $post->title }}">
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
							<a href="{{ route('blog.single', $post->slug) }}" class="button is-primary">Read More</a>
						</div>
					</div>
				</article>
			@endif
		@endforeach
		</div>

		<div class="column">
			<div class="box is-bg-quebec3">
				<!-- Begin Signup Form -->
				<div id="mc_embed_signup">
					<h3 class="is-size-5 has-text-weight-bold"">まだやってます<br>新着記事通知サービス</h3>
					<p class="m-t-10">ここにあなたのメールアドレスをぶち込んでおけば、記事が更新された際お知らせのメールが届きます。</p>
					<p class="is-size-7 m-t-5 has-text-weight-bold">メールアドレスが他の目的で使用されることは断じてないです。ハイ。</p>
					<form action="//quebec3.us11.list-manage.com/subscribe/post?u=a9b3dcc0985f0772454a9bc96&amp;id=0fd7be20c8" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
						<div id="mc_embed_signup_scroll">
							<label class="label m-t-20 has-text-white" for="mce-EMAIL">Email:</label>
							<input type="email" value="" name="EMAIL" class="email input" id="mce-EMAIL" placeholder="example@gmail.com" required>
							<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
							<div style="position: absolute; left: -5000px;">
								<input type="text" name="b_a9b3dcc0985f0772454a9bc96_0fd7be20c8" tabindex="-1" value="">
							</div>
							<div class="clear m-t-15">
								<input class="button is-success is-fullwidth has-text-weight-bold" type="submit" value="送　信" name="subscribe" id="mc-embedded-subscribe">
							</div>
						</div>
					</form>
					<div class="tags has-addons m-t-30">
						<span class="tag"><small>安心と信頼の Quebec3</small></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<nav class="section pagination" role="navigation" aria-label="pagination">
	{{ $posts->links() }}
</nav>

@endsection