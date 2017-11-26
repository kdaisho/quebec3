@extends('main')

@section('title', '| All Categories')

@section('content')

<div class="section container">
	<h1 class="is-size-1">Categories</h1>
	<div class="columns m-t-20">
		<div class="column is-three-fifths">
			<table class="table is-fullwidth">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($categories as $category)
					<tr>
						<th>{{ $category->id }}</th>
						<td>
							<a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- end of .column -->

		<div class="column is-offset-1">
			<div class="box">
				<h2 class="is-size-4">New Category</h2>
				{!! Form::open(['route' => 'categories.store', 'method' => 'POST', 'class' => 'form']) !!}
					{{ Form::label('name', 'Name:', ['class' => 'label m-t-10']) }}
					{{ Form::text('name', null, ['class' => 'input']) }}
					{{ Form::submit('Create New Category', ['class' => 'button is-primary is-fullwidth m-t-20']) }}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection