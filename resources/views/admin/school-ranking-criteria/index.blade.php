@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>School ranking criteria</h4></div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/school-ranking-criteria/create') }}" class="btn btn-success btn-md" title="Add New SchoolRankingCriterium">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/school-ranking-criteria', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                                        <th>Class</th>
                                        <th>Students</th>                                        
                                        <th>Pass</th>
                                        <th>Attendance</th>
                                        <th>Fee</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($schoolrankingcriteria as $item)
                                    <tr>
                                        <td>{{ $item->class }}</td>
                                        <td>{{ $item->students }}</td>
                                        <td>{{ $item->pass }}</td>
                                        <td>{{ $item->attendance }}</td>                                      
                                        <td>{{ $item->fee }}</td>
                                        <td>
                                            <a href="{{ url('/admin/school-ranking-criteria/' . $item->id) }}" title="View SchoolRankingCriterium"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/school-ranking-criteria/' . $item->id . '/edit') }}" title="Edit SchoolRankingCriterium"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/school-ranking-criteria', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete SchoolRankingCriterium',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                                <tbody>
                                    <tr>
                                        <td><b>Total</b></td>
                                        <td>{{ $total_students }}</td>
                                        <td>{{ $total_pass/count($results) }}<br>(<small>Average</small>)</td>
                                        <td>{{ $total_attendance/count($results) }}<br>(<small>Average</small>)</td>
                                        <td>{{ $total_fees }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $schoolrankingcriteria->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
