<div class="link columns is-mobile">
	@if(isset($previous->slug))
	<div class="column is-6 has-text-centered link-item">
		<a class="link-item__prev" href="{{ url('blog/' . $previous->slug) }}">
			<i class="arrow fa fa-chevron-left m-r-10"></i>{{ $previous->title }}
		</a>
	</div>
	@else
	<div class="column is-6 has-text-centered link-item">
		<a class="link-item__next"  href="{{ route('blog.index') }}">
			記事一覧へ戻る
		</a>
	</div>
	@endif

	<div class="pipe"></div>

	@if(isset($next->slug))
	<div class="column is-6 has-text-centered link-item">
		<a class="link-item__next"  href="{{ url('blog/' . $next->slug) }}">
			{{ $next->title }}<i class="arrow fa fa-chevron-right m-l-10"></i>
		</a>
	</div>
	@else
	<div class="column is-6 has-text-centered link-item">
		<a class="link-item__next"  href="{{ route('blog.index') }}">
			記事一覧へ戻る
		</a>
	</div>
	@endif
</div>

<div class="has-text-centered m-t-30">
	<a href="{{ route('blog.index') }}" class="button is-primary is-medium">記事一覧へ</a>
</div>