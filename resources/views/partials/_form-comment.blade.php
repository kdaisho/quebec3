<h4 class="is-size-4 is-size-4-mobile">コメントどうぞ。<span class="is-size-6 no-wrap"><span class="has-text-danger">*</span>は必須項目です。</span></h4>
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