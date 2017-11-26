@extends('main')

@section('title', '| Edit Tag')

@section('content')

	{!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT', 'class' => 'label']) !!}

		{{ Form::label('name', 'Title:', ['class' => 'label']) }}
		{{ Form::text('name', null, ['class' => 'input']) }}

		{{ Form::submit('Save Changes', ['class' => 'button is-success m-t-20']) }}

	{!! Form::close() !!}

@endsection