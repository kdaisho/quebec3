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

		errorMsgEmail = document.getElementById("errorMsgEmail");
		errorMsgEmailValidate = document.getElementById("errorMsgEmailValidate");
		errorMsgSubject = document.getElementById("errorMsgSubject");
		errorMsgMessage = document.getElementById("errorMsgMessage");

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
		errorMsgEmail.style.display = errorMsgEmailValidate.style.display = errorMsgSubject.style.display = errorMsgText.style.display = "none";
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
		if (textValue.length <= 10) {
			resOutput.innerHTML = textValue;
			errorMsgText.style.display = "block";
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