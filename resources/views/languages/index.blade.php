<!-- languages/index.blade.php -->

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

	@if(!empty($languages))
		<table class="table table-striped table-nonfluid">
			<thead>
				<th>Actions</th>
				<th>Language</th>
			</thead>
			<tbody>
				@foreach($languages as $language)
					<tr>
						<td>
							<div class="dropdown">
								<button class="btn btn-default dropdown-toggle btn-xs" type="button" data-toggle="dropdown">Actions
								<span class="caret"></span></button>
								<ul class="dropdown-menu">
									<li><a href="{{ route('languages.edit', $language['id']) }}">Edit</a></li>
									<li><a href="{{ route('languages.destroy', $language['id']) }}" class="btn-del">Delete</a></li>
								</ul>
							</div>
						</td>
						<td>{{ $language->name }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
		<h4>No languages found.</h4>
	@endif

@stop