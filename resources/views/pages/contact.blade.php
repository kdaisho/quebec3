@extends('main')

@section('title', '| Contact')

@section('content')

<section class="section is-hero-gen">
	<div class="container is-widescreen">
		<h1 class="title is-size-1 is-size-3-mobile">接触を試みる</h1>
	</div>
</section>

<seciton class="section container">
	<div class="column is-8 is-offset-2">
		<p class="is-size-5 is-size-6-mobile">
			質問や意見があればお気軽にどうぞ。
		</p>

		<hr>

		@include('partials._form')
	</div>
</section>

@endsection