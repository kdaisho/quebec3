@extends('main')

@section('title', '| Contact')

@section('content')

<section class="section is-bg-purple has-text-centered">
	<div class="container is-widescreen">
		<h1 class="title is-size-1 is-size-3-mobile has-text-white">接触を試みる</h1>
		<p class="has-text-white has-text-centered is-size-5 is-size-6-mobile text-bg">管理人に文句や褒め言葉を送ることが<span class="no-wrap">できます。</span></p>
	</div>
</section>

<section class="section container">
	<div class="column is-6-desktop is-offset-3-desktop is-10-tablet is-offset-1-tablet">
		@include('partials._form')
	</div>
</section>

@endsection