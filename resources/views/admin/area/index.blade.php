@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                @include('inc.message')
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Area</h4></div>
                    <div class="panel-body">
                        @can('add area')
                            <a href="{{ url('/admin/area/create') }}" class="btn btn-success btn-md" title="Add New Area">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>
                        @endcan
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/area', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th><th>District</th><th>Thana</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($area as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->district }}</td><td>{{ $item->thana }}</td>
                                        <td>
                                            <a href="{{ url('/admin/area/' . $item->id) }}" title="View Area"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            @can('edit area')
                                                <a href="{{ url('/admin/area/' . $item->id . '/edit') }}" title="Edit Area"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            @endcan
                                            @can('delete area')
                                                {!! Form::open([
                                                    'method'=>'DELETE',
                                                    'url' => ['/admin/area', $item->id],
                                                    'style' => 'display:inline'
                                                ]) !!}
                                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                            'type' => 'submit',
                                                            'class' => 'btn btn-danger btn-sm',
                                                            'title' => 'Delete Area',
                                                            'onclick'=>'return confirm("Confirm delete?")'
                                                    )) !!}
                                                {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $area->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
