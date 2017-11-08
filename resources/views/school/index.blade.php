
@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
					@foreach ($schools as $school)
						<div class="list-group">
						  <a href="/school/{{$school->id}}" class="list-group-item">
						  	<h4 class="list-group-item-heading">{{ $school->name }}</h4>
						  	<p class="list-group-item-text">{{ $school->website }}</p>
						  </a>
						</div>
					@endforeach
			</div>
		</div>	
	</div>
@endsection