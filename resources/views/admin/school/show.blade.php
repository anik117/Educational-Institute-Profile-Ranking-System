@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading"><h5>{{ $school->name }}</h5></div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/school') }}" title="Back"><button class="btn btn-default btn-md"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/school/' . $school->id . '/edit') }}" title="Edit School"><button class="btn btn-primary btn-md"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        @can('delete school')
                            {!! Form::open([
                                'method'=>'DELETE',
                                'url' => ['admin/school', $school->id],
                                'style' => 'display:inline'
                            ]) !!}
                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger btn-md',
                                        'title' => 'Delete School',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                ))!!}
                            {!! Form::close() !!}
                        @endcan
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $school->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Name </th>
                                        <td> {{ $school->name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Code </th>
                                        <td> {{ $school->code }} </td></tr>
                                    <tr>
                                        <th> Website </th>
                                        <td> <a href="http://{{ $school->website }}">{{ $school->website }}</a></td>
                                    </tr>
                                    <tr>
                                        <th> Email </th>
                                        <td> {{ $school->email }} </td>
                                    </tr>
                                    <tr>
                                        <th> Phone </th>
                                        <td> {{ $school->phone }} </td>
                                    </tr>
                                    <tr>
                                        <th> Area (thana) </th>
                                        <td> {{ $school->area->thana }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
