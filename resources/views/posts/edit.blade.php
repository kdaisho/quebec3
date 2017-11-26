@extends('main')

@section('title', '| Edit Blog Post')

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

@section('stylesheets')
	{!! Html::style('css/select2.min.css') !!}
@endsection

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
tinymce.init({
	selector: 'textarea',
	height: 300,
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

	{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}

	<div class="columns">

		<div class="column is-9">
			<img src="{{ asset('images/' . $post->image) }}" alt="Featured Image" style="display: block;">

			{{ Form::label('title', 'Title:', ['class' => 'label m-t-20']) }}
			{{ Form::text('title', null, ['class' => 'input']) }}

			{{ Form::label('slug', 'Slug:', ['class' => 'label m-t-20']) }}
			{{ Form::text('slug', null, array('class' => 'input')) }}

			{{ Form::label('category_id', 'Category:', ['class' => 'label m-t-20']) }}
			<div class="control select">
				{{ Form::select('category_id', $categories, null, ['class' => 'select']) }}
			</div>

			{{ Form::label('tags', 'Tag:', ['class' => 'label m-t-20']) }}
			<div class="control select is-fullwidth">
				{{ Form::select('tags[]', $tags, null, ['class' => 'select2-multi select', 'multiple' => 'multiple']) }}
			</div>

			<div class="file m-t-40">
				<span class="file-cta">
					<span class="file-icon">
						<i class="fa fa-upload"></i>
					</span>
					<span class="file-label">
						{{ Form::label('featured_image', 'Update Featured Image:', ['class' => 'label']) }}
					</span>
				</span>
				{{ Form::file('featured_image', ['class' => 'file-input']) }}
			</div>

			{{ Form::label('body', 'Body:', ['class' => 'label m-t-20']) }}
			{{ Form::textarea('body', null, ['class' => 'input', 'rows' => '20']) }}

			{{ Form::label('is_online', 'State', ['class' => 'label m-t-20']) }}
			<div class="control select">
				<select name="is_online">
					<option value="0">Draft</option>
					<option value="1" selected>Online</option>
				</select>
			</div>
		</div>

		<div class="column">
			<div class="box">
				<dl class="dl-horizontal">
					<dt>Created At:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Last Updated:</dt>
					<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
				</dl>
				<hr>
				{!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'button is-danger is-fullwidth')) !!}
				{{ Form::submit('Save Changes', ['class' => 'button is-success is-fullwidth m-t-20']) }}
			</div>
		</div>

	</div> <!-- end of .columns -->
	{!! Form::close() !!}
</div>

@endsection

@section('scripts')
	{!! Html::script('js/select2.min.js') !!}
	<script>
		$('.select2-multi').select2();
	</script>
@endsection