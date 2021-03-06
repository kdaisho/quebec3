<h2 class="title has-text-centered is-size-3 is-size-5-mobile">ご質問・ご意見あれば<span class="no-wrap">どーぞ。</span></h2>
<p class="has-text-centered">ここにメッセージをぶち込むと速攻で<span class="no-wrap">管理人</span>宛に<span class="no-wrap">メール</span>が<span class="no-wrap">届きます。</span></p>

<form action="{{ url('contact') }}" method="POST" class="field">
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

	<div class="control has-icons-left email-extra">
		{{ Form::text('email_extra', null, ['id' => 'email_extra', 'class' => 'input', 'placeholder' => 'example@gmail.com', 'tabindex' => '-1', 'autocomplete' => 'off']) }}
	</div>

	<label class="label m-t-20" for="message" name="message">メッセージ:</label>
	<div class="control has-icons-left">
		<textarea id="message" name="message" class="textarea" rows="7"></textarea>
		<p id="errorMsgText" class="help is-danger" style="display: none;">
			この欄は必須ですって。
		</p>
		<p id="errorMsgTextTooShort" class="help is-danger" style="display: none;">
			"<span id="textRes"></span>" って言われても...もう少し書きましょうよ。
		</p>
	</div>

	<input id="submit" type="submit" value="送　信" class="m-t-20 button is-fullwidth is-success">
</form>

<script>
/* ==== form validation ==== */
document.getElementById("submit").addEventListener("click", function(event) {

	var error = false,
		emailInput = document.getElementById("email"),
		emailValue = document.getElementById("email").value,
		subjectInput = document.getElementById("subject"),
		subjectValue = document.getElementById("subject").value,
		textInput = document.getElementById("message"),
		textValue = document.getElementById("message").value,
		errorMsgEmail = document.getElementById("errorMsgEmail"),
		errorMsgEmailValidate = document.getElementById("errorMsgEmailValidate"),
		errorMsgSubject = document.getElementById("errorMsgSubject"),
		errorMsgText = document.getElementById("errorMsgText");
		errorMsgTextTooShort = document.getElementById("errorMsgTextTooShort");

	setDefault();
	validateEmail(emailValue);
	validateSubject();
	validateText();

	if (error) {
		preventSubmit(event);
	}

	function setDefault() {
		emailInput.className = "input";
		subjectInput.className = "input";
		textInput.className = "textarea";
		errorMsgEmail.style.display = errorMsgEmailValidate.style.display = errorMsgSubject.style.display = errorMsgText.style.display = errorMsgTextTooShort.style.display = "none";
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

	function validateSubject() {
		subjectValue = subjectValue.trim();
		if (subjectValue.length <= 0) {
			subjectInput.value = "";
			errorMsgSubject.style.display = "block";
			subjectInput.className = "input is-danger";
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
		else if (textValue.length != 0 && textValue.length <= 10) {
			resOutput.innerHTML = textValue;
			errorMsgTextTooShort.style.display = "block";
			textInput.className = "textarea is-danger";
			error = true;
			return false;
		}
	}

	function preventSubmit(event) {
		this.event.preventDefault();
	}
});
</script>