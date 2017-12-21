
@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
					@foreach ($areas as $area)
						<div class="list-group">
						  <a href="/area/{{$area->id}}" class="list-group-item">
						  	<h4 class="list-group-item-heading">{{ $area->district }}</h4>
						  	<p class="list-group-item-text">{{ $area->thana }}</p>
						  </a>
						</div>
					@endforeach
			</div>
		</div>	
	</div>
@endsection