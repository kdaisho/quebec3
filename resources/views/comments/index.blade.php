@extends('main')

@section('title', '| All Comments')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>Comments</h1>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($comments->reverse() as $comment)
					<tr>
						<th>{{ $comment->id }}</th>
						<th>{{ $comment->name }}</th>
						<th>{{ $comment->email }}</th>
						<th>{{ $comment->created_at }}</th>
						<th>{{ $comment->comment }}</th>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div> <!-- end of .col-md-8 -->

		<div class="row">
		    <div class="col-md-12">
		        <div class="text-center">
		            {{-- {!! $comments->links(); !!} --}}
		        </div>
		    </div>
		</div>

		{{-- <div class="col-md-3">
			<div class="well">
				<h2>New Category</h2>
				{!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
					{{ Form::label('name', 'Name:') }}
					{{ Form::text('name', null, ['class' => 'form-control']) }}
					{{ Form::submit('Create New Category', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}
				{!! Form::close() !!}
			</div>
		</div> --}}
	</div>
@endsection