@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading"><h5>Class {{ $schoolrankingcriterium->class }}</h5></div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/school-ranking-criteria') }}" title="Back"><button class="btn btn-default btn-md"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/school-ranking-criteria/' . $schoolrankingcriterium->id . '/edit') }}" title="Edit SchoolRankingCriterium"><button class="btn btn-primary btn-md"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/schoolrankingcriteria', $schoolrankingcriterium->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-md',
                                    'title' => 'Delete SchoolRankingCriterium',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Class</th><td>{{ $schoolrankingcriterium->class }}</td>
                                    </tr>
                                    <tr>
                                        <th> Students </th><td> {{ $schoolrankingcriterium->students }} </td>
                                    </tr>
                                    <tr>
                                        <th> Pass </th><td> {{ $schoolrankingcriterium->pass }} </td>
                                    </tr>
                                    <tr>
                                        <th> Attendance </th><td> {{ $schoolrankingcriterium->attendance }} </td>
                                    </tr>
                                    <tr>
                                        <th> Fee </th><td> {{ $schoolrankingcriterium->fee }} </td>
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
