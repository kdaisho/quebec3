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
				{!! $post->body !!}
			</div>
			<hr>
			<p>カテゴリー：<span class="tag is-info">{{ $post->category->name }}</span></p>
		</div>
	</div>

	<div class="column is-8-desktop is-offset-2-desktop is-10-tablet is-offset-1-tablet m-to-50">
		<h3 class="is-size-3">
			<i class="fa fa-comments m-r-10"></i> コメント {{ $post->comments()->count() }}
		</h3>
		@foreach($post->comments->reverse() as $comment)
			<div class="comment m-t-40">
				<div class="columns is-mobile">
					<div class="column is-narrow">
						<img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid" }}" alt="commenter icon" class="author-image">
					</div>
					<div class="column">
						<h4 class="is-size-5">
							@if(isset($comment->name))
								{{ $comment->name }}
							@else
								名無しさん
							@endif
						</h4>
						<p class="has-text-weight-light is-size-6 is-size-7-mobile">{{ date('Y年 m月d日 g:i A',  strtotime($comment->created_at)) }}</p>
					</div>
				</div>
				<div class="comment-content">
					{{ $comment->comment }}
				</div>
				<hr>
			</div>
		@endforeach
	</div>

	<div class="column is-8-desktop is-offset-2-desktop is-10-tablet is-offset-1-tablet m-t-50">
		<h4 class="is-size-3 is-size-4-mobile">コメントどうぞ。<span class="is-size-6 no-wrap"><span class="has-text-danger">*</span>は必須項目です。</span></h4>
		{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST', 'class' => 'form']) }}

			{{ Form::label('name', 'お名前:', ['class' => 'label m-t-20']) }}
			<div class="control has-icons-left">
				{{ Form::text('name', null, ['class' => 'input', 'placeholder' => '匿名希望なら空欄で良いです。']) }}
				<span class="icon is-small is-left">
					<i class="fa fa-user"></i>
				</span>
			</div>

			<label for="email" class="label m-t-20"><span class="has-text-danger">*</span>メールアドレス:<span class="is-size-6 is-size-7-mobile no-wrap">（公開されることはありません。）</span></label>
			<div class="control has-icons-left">
				{{ Form::text('email', null, ['id' => 'email', 'class' => 'input', 'placeholder' => 'example@gmail.com']) }}
				<span class="icon is-small is-left">
					<i class="fa fa-envelope"></i>
				</span>
				<p id="errorMsgEmail" class="help is-danger" style="display: none;">
					この欄は必須です。
				</p>
				<p id="errorMsgEmailValidate" class="help is-danger" style="display: none;">
					それはEmailのアドレスじゃない気がする。
				</p>
			</div>

			<div class="control has-icons-left">
				<label for="comment" class="label m-t-20"><span class="has-text-danger">*</span>コメント:</label>
				{{ Form::textarea('comment', null, ['id' => 'comment', 'class' => 'textarea', 'rows' => '5']) }}
				<p id="errorMsgText" class="help is-danger" style="display: none;">
					この欄は必須と言ったでしょう。
				</p>
				<p id="errorMsgTextTooShort" class="help is-danger" style="display: none;">
					"<span id="textRes"></span>" って言われても...もう少し書きましょうよ。
				</p>
				{{ Form::submit('コメントする', ['id' => 'submit', 'class' => 'button is-success m-t-30 is-fullwidth']) }}
			</div>

		{{ Form::close() }}
	</div>

	<div class="column is-8-desktop is-offset-2-desktop is-10-tablet is-offset-1-tablet m-t-50">
		<div class="link columns is-mobile">
			@if(isset($previous->slug))
			<div class="column is-6 has-text-centered link-item">
				<a class="link-item__prev" href="{{ url('blog/' . $previous->slug) }}">
					<i class="arrow fa fa-chevron-left m-r-10"></i>{{ $previous->title }}
				</a>
			</div>
			@else
			<div class="column is-6 has-text-centered link-item">
				<a class="link-item__next"  href="{{ route('blog.index') }}">
					記事一覧へ戻る
				</a>
			</div>
			@endif

			<div class="pipe"></div>

			@if(isset($next->slug))
			<div class="column is-6 has-text-centered link-item">
				<a class="link-item__next"  href="{{ url('blog/' . $next->slug) }}">
					{{ $next->title }}<i class="arrow fa fa-chevron-right m-l-10"></i>
				</a>
			</div>
			@else
			<div class="column is-6 has-text-centered link-item">
				<a class="link-item__next"  href="{{ route('blog.index') }}">
					記事一覧へ戻る
				</a>
			</div>
			@endif
		</div>

		<div class="has-text-centered m-t-30">
			<a href="{{ route('blog.index') }}" class="button is-primary is-medium">記事一覧へ</a>
		</div>
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