<form action="{{ url('contact') }}" method="POST" class="field column is-6 is-offset-3">
	{{ csrf_field() }}

	<label class="label m-t-20" for="email" name="email">メールアドレス:</label>
	<div class="control has-icons-left">
		<input id="email" type="text" name="email" class="input" placeholder="example@gmail.com">
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

	<label class="label m-t-20" for="email" name="subject">お題:</label>
	<div class="control has-icons-left">
		<input id="subject" type="text" name="subject" class="input">
		<span class="icon is-small is-left">
			<i class="fa fa-commenting"></i>
		</span>
		<p id="errorMsgSubject" class="help is-danger" style="display: none;">
			この欄は必須です。
		</p>
	</div>

	<label class="label m-t-20" for="message" name="message">メッセージ:</label>
	<div class="control has-icons-left">
		<textarea id="message" name="message" class="textarea"></textarea>
		<p id="errorMsgText" class="help is-danger" style="display: none;">
			"<span id="textRes"></span>" って言われても...この欄もうちょっと書いてもらわないと困る。
		</p>
	</div>

	<input id="submit" type="submit" value="送　信" class="m-t-20 button is-fullwidth is-success">
</form>

@include('partials._validation')