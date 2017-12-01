@if ($paginator->hasPages())
	<ul class="pagination-list">
		{{-- Previous Page Link --}}
		@if ($paginator->onFirstPage())
			<li class="disabled icon"><span class="fa fa-chevron-left"></span></li>
		@else
			<li><a href="{{ $paginator->previousPageUrl() }}" class="icon" rel="prev"><span class="fa fa-chevron-left"></span></a></li>
		@endif

		{{-- Pagination Elements --}}
		@foreach ($elements as $element)
			{{-- "Three Dots" Separator --}}
			@if (is_string($element))
				<li class="disabled"><span>{{ $element }}</span></li>
			@endif

			{{-- Array Of Links --}}
			@if (is_array($element))
				@foreach ($element as $page => $url)
					@if ($page == $paginator->currentPage())
						<li><span class="pagination-link is-current">{{ $page }}</span></li>
					@else
						<li><a class="pagination-link" href="{{ $url }}">{{ $page }}</a></li>
					@endif
				@endforeach
			@endif
		@endforeach

		{{-- Next Page Link --}}
		@if ($paginator->hasMorePages())
			<li><a href="{{ $paginator->nextPageUrl() }}" class="icon" rel="next"><span class="fa fa-chevron-right"></span></a></li>
		@else
			<li class="disabled icon"><span class="fa fa-chevron-right"></span></li>
		@endif
	</ul>
@endif
