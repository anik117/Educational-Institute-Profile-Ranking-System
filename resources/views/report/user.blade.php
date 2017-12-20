@extends('layouts.app')

@section('content')
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="table table-responsive">
			    <table class="table table-borderless">
			        <thead>
			            <tr>
			                <th>#</th>
			                <th>Name</th>
			                <th>Email</th>
			            </tr>
			        </thead>
			        <tbody>
			        @foreach($users as $item)                                   
			            <tr>
			                <td>{{ $item->id }}</td>
			                <td>{{ $item->name }}</td>
			                <td>{{ $item->email }}</td>
			            </tr>
			        @endforeach
			        </tbody>
			    </table>
			</div>
		</div>
	</div>
@endsection