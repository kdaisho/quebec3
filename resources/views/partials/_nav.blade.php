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
				<a class="navbar-item" href="{{ route('posts.index') }}">Posts</a>
				<a class="navbar-item" href="{{ route('categories.index') }}">Categories</a>
				<a class="navbar-item" href="{{ route('tags.index') }}">Tags</a>
				<a class="navbar-item" href="{{ route('comments.index') }}">Comments</a>
				<a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
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
			<a class="navbar-item" href="{{ url('/') }}">
				Quebec3
			</a>
			<div class="button navbar-burger" data-target="navMenu">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>

		<div class="navbar-menu navbar-end" id="navMenu">
			<a class="navbar-item m-l-10" href="{{ url('/') }}">
				Home
			</a>
			<a class="navbar-item" href="{{ route('blog.index') }}">
				Blog
			</a>
			<a class="navbar-item" href="{{ url('about') }}">
				About
			</a>
			<a class="navbar-item" href="{{ url('contact') }}">
				Contact
			</a>
		</div>
	</div>
</nav>