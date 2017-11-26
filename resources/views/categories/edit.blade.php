@extends('main')

@section('title', '| Edit Category')

@section('content')

	{!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PUT', 'class' => 'label']) !!}

		{{ Form::label('name', 'Title:', ['class' => 'label']) }}
		{{ Form::text('name', null, ['class' => 'input']) }}

		{{ Form::submit('Save Changes', ['class' => 'button is-success m-t-20']) }}

	{!! Form::close() !!}

@endsection