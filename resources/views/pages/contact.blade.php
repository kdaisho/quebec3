@extends('main')

@section('title', '| Contact')

@section('content')

<div class="section container">

	<h1 class="is-size-1 is-size-3-mobile">コンタクト</h1>
	<p class="is-size-5">
		質問や意見があればお気軽にどうぞ。
	</p>

	<hr>

	@include('partials._form')

</div>

@endsection