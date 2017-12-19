@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="jumbotron" style="background: #fff; border: 2px solid rgba(0, 0, 0, 0.1);">
                    <h4>Welcome <b>{{ Auth::user()->name }}</b>!</h4>
                    @role('deo')
                    <p class="text-muted">Manage system.</p>
                    @endrole
                </div>

                @role('deo')
                <div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading text-center">
                                <h5 style="color: #fff">Total Users</h5>
                            </div>
                            <div class="panel-body">
                                <h3 class="text-center">
                                    <a style="text-decoration: none; color: #000" href="/admin/user">{{ Auth::user()->count() }}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-success">
                            <div class="panel-heading text-center">
                                <h5 style="color: #fff">Total Areas</h5>
                            </div>
                            <div class="panel-body">
                                <h3 class="text-center">
                                    <a style="text-decoration: none; color: #000" href="/admin/area">2</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-info">
                            <div class="panel-heading text-center">
                                <h5 style="color: #fff">Total Schools</h5>
                            </div>
                            <div class="panel-body">
                                <h3 class="text-center">
                                    <a style="text-decoration: none; color: #000" href="/admin/school">4</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endrole
            </div>
        </div>
    </div>
@endsection