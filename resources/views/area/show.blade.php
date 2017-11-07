@extends ('layouts.app')

@section('content')
    <a class="btn btn-default" href="/area">Go Back</a>
    <h2>{{ $area->district }}</h2>
    <hr>
    <div class="well">
        <h5>{{ $area->thana }}</h5>
    </div>
@endsection