@extends('main')

@section('title', '| Create New Post')

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

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

<div class="section container">
	<h1>Create New Post</h1>
	<hr>
	<div class="column is-12">

		{!! Form::open(['route' => 'posts.store', 'files' => true], ['class' => 'field column is-three-fifths is-offset-one-fifth']) !!}
			{{ Form::label('title', 'Title:', ['class' => 'label m-t-20']) }}
			{{ Form::text('title', null, ['class' => 'input']) }}

			{{ Form::label('slug', 'Slug:', ['class' => 'label m-t-20']) }}
			{{ Form::text('slug', null, ['class' => 'input']) }}

			{{ Form::label('category', 'Category:', ['class' => 'label m-t-20']) }}
			<div class="control select">
				<select name="category_id">
					@foreach($categories as $category)
						<option value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
			</div>

			{{ Form::label('tags', 'Tag:', ['class' => 'label m-t-20']) }}
			<div class="control select is-fullwidth">
				<select class="select2-multi" name="tags[]" multiple="multiple">
					@foreach($tags as $tag)
						<option value="{{ $tag->id }}">{{ $tag->name }}</option>
					@endforeach
				</select>
			</div>

			<div class="file m-t-40">
				<span class="file-cta">
					<span class="file-icon">
						<i class="fa fa-upload"></i>
					</span>
					<span class="file-label">
						{{ Form::label('featured_image', 'Upload Featured Image:', ['class' => 'file-label']) }}
					</span>
				</span>
				{{ Form::file('featured_image', ['class' => 'file-input']) }}
			</div>

			<div class="file m-t-40">
				<span class="file-cta">
					<span class="file-icon">
						<i class="fa fa-upload"></i>
					</span>
					<span class="file-label">
						{{ Form::label('images', 'Upload Multiple Images:', ['class' => 'file-label']) }}
					</span>
				</span>
				{{ Form::file('images[]', ['id' => 'images', 'class' => 'file-input', 'multiple']) }}
			</div>

			{{ Form::label('body', 'Body:', ['class' => 'label m-t-20']) }}
			{{ Form::textarea('body', null, ['class' => 'textarea']) }}

			{{ Form::label('is_online', 'State', ['class' => 'label m-t-20']) }}
			<div class="control select">
				<select name="is_online" class="is-fullwidth">
					<option value="0">Draft</option>
					<option value="1" selected>Online</option>
				</select>
			</div>

			{{ Form::submit('Create Post', ['class' => 'button is-success m-t-20 is-fullwidth']) }}
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