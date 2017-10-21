@extends('layouts.app')

@section('content')
{{-- <div class="container">
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
                    You are logged in as Admin!
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!-- New dashboard -->
<div class="container">
    <h3>
        <a href="{{URL::route('admin.dashboard')}}" class=""><strong><span class="glyphicon glyphicon-dashboard"></span> Admin Dashboard</strong></a>
    </h3>
    <hr>
    <div class="row">
        {{-- Side nav --}}
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
                <li class="nav-header">
                    
                </li>
                <li class="active">
                    <a href="" class="">Home</a>
                </li>
                <li>
                    <a href="" class="">Users</a>
                </li>
                <li>
                    <a href="" class="">Institutes</a>
                </li>
                <li>
                    <a href="" class="">Tasks</a>
                </li>
                <li>
                    <a href="" class="">Notifications</a>
                </li>
                <li>
                    <a href="" class="">Reports</a>
                </li>
            </ul>
        </div>

        {{-- Side Content --}}
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6">
                    <div class="well">Inbox Messages
                        <span class="badge pull-right">3</span>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            New Messages
                        </div>
                        <div class="panel-body">
                            <p>Here goes messages</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            General Messages
                        </div>
                        <div class="panel-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /Main -->
@endsection
