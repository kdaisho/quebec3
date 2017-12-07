<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>500: 何かがおかしい</title>
	<link rel="stylesheet" href="{{ url('css/app.css') }}">
</head>

<body>

	<section class="section has-text-centered is-bg-quebec3">
		<div class="container is-widescreen">
			<h1 class="title is-size-2 is-size-4-mobile has-text-white">
				500<br>なんだかうまいこといきませんでした。
			</h1>
			<p class="is-size-5 is-size-6-mobile has-text-white text-bg">たまにあるんですよこういうの。</p>
		</div>
	</section>

	<section class="container has-text-centered m-b-50">

		<div class="m-b-20 m-t-50">
			<p class="is-size-5 is-size-6-mobile">お探しのものここにあるかもしれません。</p>
			<div>
				<i class="fa fa-chevron-down is-size-5 m-b-10 m-t-10"></i>
			</div>
			<a href="{{ route('blog.index') }}" class="button is-primary is-medium" style="width: 180px;">記事一覧へ</a>
		</div>

		<div class="m-t-50">
			<p class="is-size-5 is-size-6-mobile">いや、ここかも。</p>
			<div>
				<i class="fa fa-chevron-down is-size-5 m-b-10 m-t-10"></i>
			</div>
			<a href="{{ url('/') }}" class="button is-primary is-medium" style="width: 180px;">ホーム</a>
		</div>

	</section>

	<hr>
	<p class="has-text-centered m-b-20">Copyright {{ date("Y") }} &commat;Quebec3 - All Rights Reserved</p>

</body>

</html>