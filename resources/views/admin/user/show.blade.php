@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading"><h5>{{ $user->name }}</h5></div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/user') }}" title="Back"><button class="btn btn-default btn-md"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        @hasanyrole('deo|ah')  
                        <a href="{{ url('/admin/user/' . $user->id . '/edit') }}" title="Edit user"><button class="btn btn-primary btn-md"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/user', $user->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-md',
                                    'title' => 'Delete user',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        @endhasanyrole
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $user->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Name </th>
                                        <td> {{ $user->name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Email </th>
                                        <td> {{ $user->email }} </td>
                                    </tr>
                                    <tr>
                                        <th> Role </th>
                                        <td> {{ $user->roles->implode('name', ', ') }} </td>
                                    </tr>
                                    @if($user->roles->implode('name', ', ') == 'hm')
                                        <tr>
                                            <th>School</th>
                                            <td>{{$user->headmaster->school->name}}</td>
                                        </tr>
                                    @endif
                                    @if($user->roles->implode('name', ', ') == 'ah')
                                        <tr>
                                            <th>Area</th>
                                            <td>{{ $user->areahead->area->thana }}</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection