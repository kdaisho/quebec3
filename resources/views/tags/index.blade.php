@extends('main')

@section('title', '| All Tags')

@section('content')

<div class="section container">
	<h1 class="is-size-1 is-size-3-mobile">Tags</h1>
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
					@foreach ($tags as $tag)
					<tr>
						<th>{{ $tag->id }}</th>
						<td>
							<a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- end of .column -->

		<div class="column is-offset-1">
			<div class="box">
				<h2 class="is-size-4">New Tag</h2>
				{!! Form::open(['route' => 'tags.store', 'method' => 'POST', 'class' => 'form']) !!}
					{{ Form::label('name', 'Name:', ['class' => 'label m-t-10']) }}
					{{ Form::text('name', null, ['class' => 'input']) }}
					{{ Form::submit('Create New Tag', ['class' => 'button is-primary is-fullwidth m-t-20']) }}
				{!! Form::close() !!}
			</div>
		</div>

	</div> <!-- end of .columns -->
</div>
@endsection