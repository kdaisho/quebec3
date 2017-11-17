@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')
	{!! Html::style('css/select2.min.css') !!}
@endsection

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
tinymce.init({
	selector: 'textarea',
	plugins: [
		'advlist autolink lists link image charmap print preview anchor textcolor',
		'searchreplace visualblocks code fullscreen',
		'insertdatetime media table contextmenu paste code help'
	],
	toolbar: 'code | insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright | bullist numlist outdent indent | removeformat | help',
	menubar: false
});
</script>

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>Create New Post</h1>
		<hr>

		{!! Form::open(['route' => 'posts.store', 'files' => true]) !!}
			{{ Form::label('title', 'Title:') }}
			{{ Form::text('title', null, array('class' => 'form-control')) }}

			{{ Form::label('slug', 'Slug:') }}
			{{ Form::text('slug', null, array('class' => 'form-control')) }}

			{{ Form::label('category', 'Category:') }}
			<select class="form-control" name="category_id">
				@foreach($categories as $category)
					<option value="{{ $category->id }}">{{ $category->name }}</option>
				@endforeach
			</select>

			{{ Form::label('tags', 'Tag:') }}
			<select class="form-control select2-multi" name="tags[]" multiple="multiple">
				@foreach($tags as $tag)
					<option value="{{ $tag->id }}">{{ $tag->name }}</option>
				@endforeach
			</select>

			{{ Form::label('featured_image', 'Upload Featured Image:') }}
			{{ Form::file('featured_image') }}

			{{ Form::label('body', 'Post Body:') }}
			{{ Form::textarea('body', null, array('class' => 'form-control')) }}

			{{ Form::label('is_online', 'State') }}
			<select class="form-control" name="is_online">
				<option value="0">Draft</option>
				<option value="1" selected>Online</option>
			</select>

			{{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;')) }}
		{!! Form::close() !!}

	</div>
</div>

@endsection

@section('scripts')
	{!! Html::script('js/select2.min.js') !!}

	<script>
		$('.select2-multi').select2();
	</script>
@endsection