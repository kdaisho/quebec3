<h3 class="is-size-4">
	<i class="fa fa-comments m-r-10"></i> コメント {{ $post->comments()->count() }}
</h3>
@foreach($post->comments->reverse() as $comment)
	<div class="comment m-t-40">
		<div class="columns is-mobile">
			<div class="column is-narrow">
				<img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid" }}" alt="commenter icon" class="author-image">
			</div>
			<div class="column">
				<h4 class="is-size-5">
					@if(isset($comment->name))
						{{ $comment->name }}
					@else
						名無しさん
					@endif
				</h4>
				<p class="has-text-weight-light is-size-6 is-size-7-mobile">{{ date('Y年 n月j日 g:i A',  strtotime($comment->created_at)) }}</p>
			</div>
		</div>
		<div class="comment-content">
			{{ $comment->comment }}
		</div>
		<hr>
	</div>
@endforeach