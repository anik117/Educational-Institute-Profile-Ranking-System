@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                @include('inc.message')
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>School</h4></div>
                    <div class="panel-body">
                        @role('ah')
                            <a href="{{ url('/admin/school/create') }}" class="btn btn-success btn-md" title="Add New School">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>
                        @endrole
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/school', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                        <th>#</th><th>Name</th><th>Code</th><th>Area</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($school as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->code }}</td><td>{{ $item->area->thana }}</td>
                                        <td>
                                            <a href="{{ url('/admin/school/' . $item->id) }}" title="View School"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            @can('edit school')
                                                <a href="{{ url('/admin/school/' . $item->id . '/edit') }}" title="Edit School"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            @endcan

                                            @can('delete school')
                                                {!! Form::open([
                                                    'method'=>'DELETE',
                                                    'url' => ['/admin/school', $item->id],
                                                    'style' => 'display:inline'
                                                ]) !!}
                                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                            'type' => 'submit',
                                                            'class' => 'btn btn-danger btn-sm',
                                                            'title' => 'Delete School',
                                                            'onclick'=>'return confirm("Confirm delete?")'
                                                    )) !!}
                                                {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $school->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
