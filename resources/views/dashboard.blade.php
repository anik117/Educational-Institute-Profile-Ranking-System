@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>You are logged in!</p>

                    @role('deo|ah|hm') {{-- Laravel-permission blade helper --}}
                        <a class="btn btn-primary" href="/admin">Admin Dashboard</a>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
