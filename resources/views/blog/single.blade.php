@extends('main')

<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| $titleTag")

<?php $desc = ""; ?>

@foreach($post->tags as $tag)
	<?php $desc .=  $tag->name .', '; ?>
@endforeach

@section('openGraph')
	<meta property="og:title" content="{{ $post->title }}" />
	<meta property="og:site_name" content="Quebec3 - 海外移住ポータル" />
	<meta property="og:url" content="{{ url()->current() }}" />
	<meta property="og:type" content="website" />
	<meta property="og:description" content="{{ mb_substr(strip_tags($post->body), 0, 50) }}" />
	<meta property="og:image" content="{{ asset('images/' . $post->slug . '/' . $post->image) }}-original.jpg" />
	<meta property="og:image:width" content="400" />
@endsection

@section('desc', "$desc")

@section('content')

<section class="section container is-blog-single">
	<div class="column is-6-desktop is-offset-3-desktop is-10-tablet is-offset-1-tablet">
		@if(isset($post->image))
		<img class="featured-image" src="{{ asset('images/' . $post->slug . '/' . $post->image) }}-original.jpg" alt="Featured Image: {{ $post->title }}">
		@endif
		<div>
			<h1 class="title is-size-1 is-size-3-mobile m-t-20">{{ $post->title }}</h1>
			<p class="has-text-weight-light m-b-10">{{ date('Y年 n月j日 g:i A',  strtotime($post->created_at)) }}</p>
			@foreach($post->tags as $tag)
				<span class="tag is-success">{{ $tag->name }}</span>
			@endforeach
		</div>

		<div class="blog-body is-desktop m-t-50">
			{!! $post->body !!}
		</div>
		<hr>
		<p>カテゴリー：<span class="tag is-info">{{ $post->category->name }}</span></p>

		<div class="m-t-30 m-b-30">
			@include('partials._ads-inarticle-03')
		</div>

		@include('partials._sns')
	</div>

	<div class="column is-6-desktop is-offset-3-desktop is-10-tablet is-offset-1-tablet m-to-50">
		@include('partials._comments')
	</div>

	<div class="column is-6-desktop is-offset-3-desktop is-10-tablet is-offset-1-tablet m-t-50">
		@include('partials._form-comment')
	</div>

	<div class="column is-6-desktop is-offset-3-desktop is-10-tablet is-offset-1-tablet m-t-50">
		@include('partials._signup')
	</div>

	<div class="column is-6-desktop is-offset-3-desktop is-10-tablet is-offset-1-tablet m-t-50">
		@include('partials._pagination')
	</div>

</section>

<script>
/* === adsense insertion === */
(function() {
	var ads = document.getElementsByClassName("ads");
	if(ads[0]) {
		ads[0].innerHTML = '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"><\/script><ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-3483277501004098" data-ad-slot="3797668697"></ins> <script>(adsbygoogle = window.adsbygoogle || []).push({});<\/script>';
	}
	else if(ads[1]) {
		ads[1].innerHTML = '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"><\/script><ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article" data-ad-format="fluid" data-ad-client="ca-pub-3483277501004098" data-ad-slot="3374302335"></ins> <script>(adsbygoogle = window.adsbygoogle || []).push({});<\/script>';
	}
}());
/* ==== form validation ==== */
document.getElementById("submit").addEventListener("click", function(event) {
	var error = false,
		emailInput = document.getElementById("email"),
		emailValue = document.getElementById("email").value,
		textInput = document.getElementById("comment"),
		textValue = document.getElementById("comment").value,
		errorMsgEmail = document.getElementById("errorMsgEmail"),
		errorMsgEmailValidate = document.getElementById("errorMsgEmailValidate"),
		errorMsgText = document.getElementById("errorMsgText"),
		errorMsgTextTooShort = document.getElementById("errorMsgTextTooShort");

	setDefault();
	validateEmail(emailValue);
	validateText();

	if (error) {
		preventSubmit(event);
	}

	function setDefault() {
		emailInput.className = "input";
		textInput.className = "textarea";
		errorMsgEmail.style.display = errorMsgEmailValidate.style.display =  errorMsgText.style.display = errorMsgTextTooShort.style.display = "none";
	}

	function validateEmail(em, event) {
		emailValue = emailValue.trim();

		if (!emailValue) {
			emailInput.value = "";
			errorMsgEmail.style.display = "block";
			emailInput.className = "input is-danger";
			error = true;
			return false;
		};

		var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9\.\-]/; // allows emails with extension (i.e, .ca, .co.jp)
		if (!filter.test(em)) {
			errorMsgEmailValidate.style.display = "block";
			emailInput.className = "input is-danger";
			error = true;
			return false;
		}
	}

	function validateText() {
		resOutput = document.getElementById("textRes");
		textValue = textValue.trim();
		if (textValue.length === 0) {
			errorMsgText.style.display = "block";
			textInput.className = "textarea is-danger";
			error = true;
			return false;
		}
		else if (textValue.length != 0 && textValue.length <= 5) {
			resOutput.innerHTML = textValue;
			errorMsgTextTooShort.style.display = "block";
			textInput.className = "textarea is-danger";
			error = true;
			return false;
		}
	}

	error = true;
	function preventSubmit(event) {
		this.event.preventDefault();
	}
});
</script>

@endsection