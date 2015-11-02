<!-- qualities/index.blade.php -->

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

	@if(!empty($qualities))
		<table class="table table-striped table-nonfluid">
			<thead>
				<th>Actions</th>
				<th>Quality</th>
			</thead>
			<tbody>
				@foreach($qualities as $quality)
					<tr>
						<td>
							<div class="dropdown">
								<button class="btn btn-default dropdown-toggle btn-xs" type="button" data-toggle="dropdown">Actions
								<span class="caret"></span></button>
								<ul class="dropdown-menu">
									<li><a href="{{ route('qualities.edit', $quality['id']) }}">Edit</a></li>
									<li><a href="{{ route('qualities.destroy', $quality['id']) }}" class="btn-del">Delete</a></li>
								</ul>
							</div>
						</td>
						<td>{{ $quality->quality }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
		<h4>No qualities found.</h4>
	@endif

@stop