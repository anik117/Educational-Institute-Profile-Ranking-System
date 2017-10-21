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

<!-- Main -->
<div class="container">
    <h3>
        <a href="{{URL::route('admin.dashboard')}}" class=""><strong><span class="glyphicon glyphicon-dashboard"></span> Admin Dashboard</strong></a>
    </h3>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
                <li class="nav-header"></li>
                <li class="active"><a href="http://bootply.com" title="The Bootstrap Playground" target="ext" class="">Home</a>

                </li>
                <li><a href="/tagged/bootstrap-3" class="">Users</a>

                </li>
                <li class="divider"></li>
                <li><a href="/61518" title="Bootstrap 3 Panel" class="">Institutes</a>

                </li>
                <li><a href="/61521" title="Bootstrap 3 Icons" class="">Tasks</a>

                </li>
                <li><a href="#" class="">Notifications</a>

                </li>
                <li><a href="/62603" class="">Reports</a>

                </li>
            </ul>
        </div>
        <!-- /span-3 -->
        <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6">
                        <div class="well">Inbox Messages <span class="badge pull-right">3</span>

                        </div>
                        <div class="panel">
                            <div class="panel-heading"> <i class="icon icon-chevron-up chevron"></i>
    <i class="icon icon-wrench pull-right"></i> Quick
                                Start</div>
                            <div class="panel-content">
                                <div class="btn-group btn-group-justified"> <a href="#" class="btn btn-primary col-sm-3">
                          <i class="glyphicon glyphicon-plus"></i>
                          <p class="" contenteditable="false">Finance</p>
                        </a>
 <a href="#" class="btn btn-primary col-sm-3">
                          <i class="glyphicon glyphicon-cloud"></i>
                          <p class="">Service</p>
                        </a>
 <a href="#" class="btn btn-primary col-sm-3">
                          <i class="glyphicon glyphicon-cog"></i>
                          <p class="">Sales</p>
                        </a>
 <a href="#" class="btn btn-primary col-sm-3">
                          <i class="glyphicon glyphicon-question-sign"></i>
                          <p class="">Inventory</p>
                        </a>

                                </div>
                            </div>
                            <!--/panel content-->
                        </div>
                        <!--/panel-->
                        <div class="panel panel-default"></div>
                        <!--/panel-->
                        <div class="panel panel-default">
                            <div class="panel-heading">Charts</div>
                            <div class="panel-body">
                                <img src="http://www.wired.com/playbook/wp-content/uploads/2012/08/data-tracking-run-chart.jpg" class="img-responsive">
                            </div>
                            <div class="panel-body">
                                <img src="http://www.wired.com/playbook/wp-content/uploads/2012/08/data-tracking-run-chart.jpg" class="img-responsive droppedHover">
                            </div>
                        </div>
                        <!--/panel-->
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">General Messages</div>
                            <div class="panel-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <!--/panel content-->
                        </div>
                        <!--/panel-->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">Service Levels</div>
                            </div>
                            <div class="panel-body pull-center">
                              
                                <img src="http://placehold.it/90X90/CC2222/FFF" class="img-circle">
                                <img src="http://placehold.it/90X90/11CC22/FFF" class="img-circle">
                                <img src="http://placehold.it/90X90/EEEEEE/222" class="img-circle">
                            </div>
                        </div>
                        <!--/panel-->   <i class="icon-bar-chart icon-3x"></i>
    <i class="icon-plus icon-3x"></i>

                        <i class="icon-facebook icon-3x"></i>   <i class="icon-beaker icon-3x"></i>
    <i class="icon-twitter icon-3x"></i>

                    </div>
                    <!--/col-span-6-->
                </div>
                <!--/row-->
        </div>
        <!--/col-span-9-->
    </div>
</div>
<!-- /Main -->
@endsection
