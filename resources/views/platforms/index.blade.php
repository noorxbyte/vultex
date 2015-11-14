<!-- platforms/index.blade.php -->

@extends('master')

@section('content')

	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	@if(!empty($platforms))
		<table class="table table-striped table-nonfluid">
			<thead>
				<th>Actions</th>
				<th>Language</th>
			</thead>
			<tbody>
				@foreach($platforms as $platform)
					<tr>
						<td>
							<div class="dropdown">
								<button class="btn btn-default dropdown-toggle btn-xs" type="button" data-toggle="dropdown">Actions
								<span class="caret"></span></button>
								<ul class="dropdown-menu">
									<li><a href="{{ route('platforms.edit', $platform['id']) }}">Edit</a></li>
									<li><a href="{{ route('platforms.destroy', $platform['id']) }}" class="btn-del">Delete</a></li>
								</ul>
							</div>
						</td>
						<td>{{ $platform->name }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
		<h4>No platforms found.</h4>
	@endif

@stop