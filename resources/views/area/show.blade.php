@extends ('layouts.app')

@section('content')
    <a class="btn btn-default" href="/area">Go Back</a>

    <div class="panel panel-default" style="margin-top: 30px;">
      <!-- Default panel contents -->
      <div class="panel-heading">
      	<h4>{{ $area->district }}</h4>
      </div>

      <!-- List group -->
      <ul class="list-group">
        <li class="list-group-item">Thana: {{ $area->thana }}</li>
      </ul>
    </div>
@endsection