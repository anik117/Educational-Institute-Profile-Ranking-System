@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 style="color: #fff">{{ $user->name }}</h4>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-2">
								<p><b>Email</b></p>
								<p><b>Role</b></p>
								@if($user->roles->implode('name', ', ') == 'hm')
									<p><b>School</b></p>
								@endif
								@if($user->roles->implode('name', ', ') == 'ah')
									<p><b>Area</b></p>
								@endif
							</div>
							<div class="col-md-10">
								<p>{{ $user->email }}</p>
								<p>{{ $user->roles->implode('name', ', ') }}</p>
								@if($user->roles->implode('name', ', ') == 'hm')
								  <p>{{ $user->headmaster->school->name }}</p>
								@endif
								@if($user->roles->implode('name', ', ') == 'ah')
								  <p>{{ $user->areahead->area->thana }}</p>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
