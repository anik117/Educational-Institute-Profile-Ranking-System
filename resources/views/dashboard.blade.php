@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Dashboard</h4>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>You are logged in to the system!</p>

                    @role('deo|ah|hm')
                        <h5><a class="btn btn-primary" href="/admin">Admin Dashboard</a></h5>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
