@extends('layouts.app')

@section('content')
    <div class="container">
    	<div class="panel panel-primary">
    		<div class="panel-heading">
    			<h5 class="text-center" style="color: white">Monthly Data For All</h5>
    		</div>
    		<div class="panel-body">
    			{!! $chart->render() !!}
    		</div>
    	</div>
    </div>
@endsection