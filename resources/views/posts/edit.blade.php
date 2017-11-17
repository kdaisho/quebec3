@extends('main')

@section('title', '| Edit Blog Post')

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

	{{-- {!! Form::model(['route' => 'posts.store']) !!} --}}
	{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}

	<div class="col-md-8">
		<img src="{{ asset('images/' . $post->image) }}" alt="Featured Image" style="display: block;">

		{{ Form::label('title', 'Title:') }}
		{{ Form::text('title', null, ['class' => 'form-control input-lg']) }}

		{{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
		{{ Form::text('slug', null, array('class' => 'form-control')) }}

		{{ Form::label('category_id', 'Category:', ['class' => 'form-spacing-top']) }}
		{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

		{{ Form::label('tags', 'Tag:', ['class' => 'form-spacing-top']) }}
		{{ Form::select('tags[]', $tags, null, ['class' => 'select2-multi form-control', 'multiple' => 'multiple']) }}

		{{ Form::label('featured_image', 'Update Featured Image:', ['class' => 'form-spacing-top']) }}
		{{ Form::file('featured_image') }}

		{{ Form::label('body', 'Body:', ['class' => 'form-spacing-top']) }}
		{{ Form::textarea('body', null, ['class' => 'form-control']) }}

		{{ Form::label('is_online', 'State') }}
		<select class="form-control" name="is_online">
			<option value="0">Draft</option>
			<option value="1" selected>Online</option>
		</select>
	</div>

	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<dt>Created At:</dt>
				<dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Last Updated:</dt>
				<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
			</dl>
			<hr>

			<div class="row">
				{{-- <div class="col-sm-6"> --}}
				<div class="col-sm-6">
					{!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
				</div>
				<div class="col-sm-6">
					{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
				</div>
			</div>
		</div>
	</div>

	{!! Form::close() !!}

</div>

@endsection

@section('scripts')
	{!! Html::script('js/select2.min.js') !!}
	<script>
		$('.select2-multi').select2();
	</script>
@endsection