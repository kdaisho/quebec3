@extends('main')

<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "| $titleTag")

<?php $desc = ""; ?>

@foreach($post->tags as $tag)
	<?php $desc .=  $tag->name .', '; ?>
@endforeach

@section('desc', "$desc")

@section('content')

<section class="section container">
	<div class="column is-8-desktop is-offset-2-desktop is-10-tablet is-offset-1-tablet">
		<div class="">
			<img class="featured-image" src="{{ asset('images/' . $post->slug . '/' . $post->image) }}-original.jpg" alt="Featured Image: {{ $post->title }}">
			<div class="has-text-centered">
				<h1 class="is-size-1 is-size-3-mobile m-t-20">{{ $post->title }}</h1>
				<p class="has-text-weight-light m-b-10">{{ date('Y年 m月d日 g:i A',  strtotime($post->created_at)) }}</p>

				@foreach($post->tags as $tag)
					<span class="tag is-success">{{ $tag->name }}</span>
				@endforeach
			</div>

			<div class="is-desktop m-t-30">
				{{-- in-article ads --}}
				{{-- @include('partials._ads-inarticle') --}}

				{!! $post->body !!}
			</div>
			<hr>
			<p>カテゴリー：<span class="tag is-info">{{ $post->category->name }}</span></p>

			@include('partials._sns')
		</div>
	</div>

	<div class="column is-8-desktop is-offset-2-desktop is-10-tablet is-offset-1-tablet m-to-50">
		@include('partials._comments')
	</div>

	<div class="column is-8-desktop is-offset-2-desktop is-10-tablet is-offset-1-tablet m-t-50">
		@include('partials._form-comment')
	</div>

	<div class="column is-8-desktop is-offset-2-desktop is-10-tablet is-offset-1-tablet m-t-50">
		@include('partials._pagination')
	</div>

</section>

<script>
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