@extends ('layouts.app')

@section('content')
    <a class="btn btn-default" href="/school">Go Back</a>

    <div class="panel panel-default" style="margin-top: 30px;">
      <!-- Default panel contents -->
      <div class="panel-heading">
      	<h4>{{ $school->name }}</h4>
      </div>

      <!-- List group -->
      <ul class="list-group">
        <li class="list-group-item">Code: {{ $school->code }}</li>
        <li class="list-group-item">Website: <a href="">{{ $school->website }}</a></li>
        <li class="list-group-item">Email: {{ $school->email }}</li>
        <li class="list-group-item">Phone: {{ $school->phone }}</li>
        <li class="list-group-item">Area (thana): {{ $school->area->thana }}</li>
      </ul>
    </div>
@endsection