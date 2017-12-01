<form action="{{ url('contact') }}" method="POST" class="field column is-6 is-offset-3">
	{{ csrf_field() }}

	<label class="label m-t-20" for="email" name="email">メールアドレス:</label>
	<div class="control has-icons-left">
		<input type="text" name="email" id="email" class="input" placeholder="example@gmail.com" required>
		<span class="icon is-small is-left">
			<i class="fa fa-envelope"></i>
		</span>
	</div>

	<label class="label m-t-20" for="email" name="subject">お題:</label>
	<div class="control has-icons-left">
		<input type="text" name="subject" id="subject" class="input" required>
		<span class="icon is-small is-left">
			<i class="fa fa-commenting"></i>
		</span>
	</div>


	<label class="label m-t-20" for="message" name="message">メッセージ:</label>
	<div class="control has-icons-left">
		<textarea name="message" id="message" class="textarea" required></textarea>
	</div>

	<input type="submit" value="送　信" class="m-t-20 button is-fullwidth is-success">
</form>