@extends('main')

@section('title', '| About')

@section('content')

<section class="section is-hero-gen">
	<div class="container is-widescreen">
		<h1 class="title is-size-1 is-size-3-mobile">Quebec3とは</h1>
	</div>
</section>

<section class="section container">
	<div class="columns">
		<div class="column is-8 is-offset-2">
			<p class="is-size-5 is-size-6-mobile">Quebec3はカナダのケベック州、モントリオールという街に住む以下の人が好き勝手に書いてるブログです。海外移住、カナダでの暮らし、労働環境、日本のことなんかを歪んだ視点から書いてます。</p>
			<hr class="m-b-20">
			<h3 class="title is-size-4">書いてる人:</h3>
			<img src="/images/profile-landscape.jpg" alt="Kyoshin-heiのプロファイル">
			<h3 class="title is-size-4">Kyoshin</h3>
			<p class="is-size-5 is-size-6-mobile m-b-10">日本生まれ日本育ち。2002年から2009年まで陸上自衛隊にて幹部として勤務。32歳になって生まれて初めて海外旅行を経験。<br>陸自退官後の2010年にカナダへ移住（と言いつつ観光ビザで上陸）。<br>ラッキーなことにそのままカナダ永住権取得したので{{ date("Y") }}年現在まで居座ることになる。</p>

			<h6 class="title is-size-4 m-t-30">FAQ: よくある質問</h6>
			<p><span class="icon"><i class="has-text-success fa fa-question"></i></span>なんでカナダに移住したんですか？</p>
			<p class="m-b-20"><span class="icon"><i class="has-text-danger fa fa-chevron-right"></i></span>カナダ人と結婚したからです。後に離婚しましたけど。</p>
			<p><span class="icon"><i class="has-text-success fa fa-question"></i></span>永住権はどうやってとったんです？</p>
			<p class="m-b-20"><span class="icon"><i class="has-text-danger fa fa-chevron-right"></i></span>カナダ人と結婚したのでファミリークラスで取得です。まぁ離婚しましたけど…。</p>
			<p><span class="icon"><i class="has-text-success fa fa-question"></i></span>英語はカナダで学んだのですか？</p>
			<p class="m-b-20"><span class="icon"><i class="has-text-danger fa fa-chevron-right"></i></span>( ´ｰ`)ﾄﾞﾔ　日本で話せるようにしておきました。<span class="icon">
				<a class="link" href="{{ url('#')}}"><i class="fa fa-arrow-right m-b-20"></i></span>訓練みたいな英語練習法</a></p>

			<p><span class="icon"><i class="has-text-success fa fa-question"></i></span>仏語は話せるのですか？（仏語はケベック州の公用語）</p>
			<p class="m-b-20"><span class="icon"><i class="has-text-danger fa fa-chevron-right"></i></span>昔はそこそこ話せましたが現在は崩壊しています。ただ長年いるせいか聞き取りは勝手に上達してます。</p>

			<p><span class="icon"><i class="has-text-success fa fa-question"></i></span>日本では仕事してました？</p>
			<p class="m-b-20"><span class="icon"><i class="has-text-danger fa fa-chevron-right"></i></span>陸上自衛隊にいました。</p>
			<p><span class="icon"><i class="has-text-success fa fa-question"></i></span>現在のお仕事は？</p>
			<p class="m-b-20"><span class="icon"><i class="has-text-danger fa fa-chevron-right"></i></span>Web屋さんです。モントリオールのとある会社で毎日カタカタしてます。</p>
			<p><span class="icon"><i class="has-text-success fa fa-question"></i></span>カナダは好きですか？</p>
			<p class="m-b-20"><span class="icon"><i class="has-text-danger fa fa-chevron-right"></i></span>好きです。</p>
		</div>
	</div>

	<div class="m-t-50 column is-8 is-offset-2">
		@include('partials._form')
	</div>


</section>

@endsection