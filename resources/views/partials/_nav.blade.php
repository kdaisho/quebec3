@if (Auth::user())
	<div class="navbar is-login">
		<div class="container">
			<div class="navbar-brand">
				<span class="navbar-item" href="{{ url('/') }}">
					Hey Kyoshin
				</span>
				<div class="button navbar-burger" data-target="navMenu2">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
			<div class="navbar-menu navbar-end" id="navMenu2">
				<a class="{{ Request::is('posts') ? "is-active" : ""}} navbar-item is-tab" href="{{ route('posts.index') }}">Posts</a>
				<a class="{{ Request::is('categories') ? "is-active" : ""}} navbar-item is-tab" href="{{ route('categories.index') }}">Categories</a>
				<a class="{{ Request::is('tags') ? "is-active" : ""}} navbar-item is-tab" href="{{ route('tags.index') }}">Tags</a>
				<a class="{{ Request::is('comments') ? "is-active" : ""}} navbar-item is-tab" href="{{ route('comments.index') }}">Comments</a>
				<a class="navbar-item is-tab" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
			</div>

			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				{{ csrf_field() }}
			</form>
		</div>
	</div>
@endif
<nav class="navbar has-shadow">
	<div class="container">
		<div class="navbar-brand" style="background: yellow;">
			<a class="navbar-item is-tab" href="{{ url('/') }}">
				Quebec3
			</a>
			<div class="button navbar-burger" data-target="navMenu">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>

		<div class="navbar-menu navbar-end" id="navMenu">
			<a class="{{ Request::is('/') ? "is-active" : ""}} navbar-item is-tab" href="{{ url('/') }}">
				Home
			</a>
			<a class="{{ Request::is('blog') ? "is-active" : ""}} navbar-item is-tab" href="{{ route('blog.index') }}">
				Blog
			</a>
			<a class="{{ Request::is('about') ? "is-active" : ""}} navbar-item is-tab" href="{{ url('about') }}">
				About
			</a>
			<a class="{{ Request::is('contact') ? "is-active" : ""}} navbar-item is-tab" href="{{ url('contact') }}">
				Contact
			</a>
		</div>
	</div>
</nav>