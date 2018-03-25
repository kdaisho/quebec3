@extends('main')

@section('content')

<section class="section container">

	<div class="columns">

		<div class="column is-6">

			<h1 class="is-size-1 is-size-3-mobile">Login<h1>

			<form class="form" method="POST" action="{{ route('login') }}">
				{{ csrf_field() }}

				<div class="{{ $errors->has('email') ? ' has-error' : '' }}">
					<label for="email" class="label m-t-20">E-Mail Address</label>
					<input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required autofocus>

					@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
				</div>

				<div class="{{ $errors->has('password') ? ' has-error' : '' }}">
					<label for="password" class="label m-t-20">Password</label>
					<input id="password" type="password" class="input" name="password" required>

					@if ($errors->has('password'))
						<span class="help-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif
				</div>

				<div class="field m-t-20">
					<div class="control">
						<label class="checkbox">
							<input class="m-r-10" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
						</label>
					</div>
				</div>

				<div class="field m-t-20">
					<div class="control">
						<button type="submit" class="button is-primary">
							Login
						</button>

						{{-- <a class="button" href="{{ route('password.request') }}">
							Forgot Your Password?
						</a> --}}
					</div>
				</div>
			</form>

		</div> <!-- end of .column -->

	</div> <!-- end of .columns -->

	<div class="columns m-t-100 has-text-centered">
		<div class="m-b-20 column is-8">
			<h2>ログインのヒント</h2>
			<p>メルアドはいつものメインで使ってるやつ。パウスはあれだよ、巨で始まって驚きマークもあるやつ。きちんと大文字開始にせよ。</p>
		</div>

		<div class="m-b-20 column is-8">

			<p class="m-b-10">Quebec3はカナダのケベック州、モントリオールという街に住む管理人が好き勝手に書いてるブログです。海外移住、カナダでの暮らし、労働環境、日本のことなんかを歪んだ視点から書いてます。これからどうなるかわかりませんが、このブログの方向性として「海外就職」を軸にしていきたいと考えています。この海外就職ってやつをどう描くがというのがもっぱら焦点になりそうなのですが、まぁ追い追いわかるでしょう。英語やフランス語のことについても触れていきたいと思います。ああ、そうそう日本の労働環境があまりにひどくそれを知らない可哀想な人も世の中にいるようなので、カナダの真っ当な労働環境も紹介していかねばなんて勝手に使命感に燃えています。カナダっていうか普通の先進国のスタンダードなのですが、労働基準法を遵守するという点、いや、日本は結構法を遵守するという点において適当なところがありますね。なんだろう。</p>

			<p class="m-b-10">それと、まぁ日本は確実に経済力を本来あるべきところまで落とし込むとみています。もう最近2018年3月現在でもその兆しは顕著になってきていて、「日本は安い国」という認識が中国に広まりつつあります。まぁ新卒で採用した社員の平均月給見てもとてもじゃないけど経済大国のそれじゃない…。その他、プログラマーなのに月収15万とか、技術をとことんないがしろにする国民性からも日本の衰退は必至でしょう。</p>

			<p class="m-b-10">Quebec3は海外移住ポータルといいつつもどこがポータルやねん、と突っ込みたくなる気持ちもわかります。そもそもポータルって何？このブログのコンテンツの偏り方を見ると、とてもじゃないが表題と中身が一致してないんじゃないかって気になる。でも変えません。だって色々面倒なことが起こりそうだから。</p>

			<h2>最近ハマっているもの</h2>
			<ul>
				<li>エビ</li>
				<li>JavaScript</li>
				<li>見かけた犬をかたっぱしから勝手になでる。</li>
			</ul>

			<p class="m-t-10 m-b-10">本ブログQuebec3は日本から脱出してまっとうな人生を送りたい人を応援するブログです。なんとかやり方見つけて気軽海外移住しましょう。</p>
		</div>
	</div>

</section>

@endsection