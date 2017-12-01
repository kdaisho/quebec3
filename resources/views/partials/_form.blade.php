<form action="{{ url('contact') }}" method="POST" class="field column is-6 is-offset-3">
	{{ csrf_field() }}

	<label for="email" name="email" class="label m-t-20">メール:</label>
	<div class="control has-icons-left">
		<input type="text" name="email" id="email" class="input" placeholder="example@gmail.com" required>
		<span class="icon is-small is-left">
			<i class="fa fa-envelope"></i>
		</span>
	</div>

	<div class="control m-t-20">
		<label for="email" name="subject" class="label">お題:</label>
		<input type="text" name="subject" id="subject" class="input" required>
	</div>


	<div class="control m-t-20">
		<label for="message" name="message" class="label">メッセージ:</label>
		<textarea name="message" id="message" class="textarea" required></textarea>
	</div>

	<input type="submit" value="送　信" class="m-t-20 button is-fullwidth is-success">
</form>