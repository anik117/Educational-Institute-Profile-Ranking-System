@extends ('layouts.app')

@section('content')
    <a class="btn btn-default" href="/school">Go Back</a>

    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default" style="margin-top: 30px;">
              <!-- Default panel contents -->
              <div class="panel-heading">
                <h5>{{ $school->name }}</h5>
              </div>

              <!-- List group -->
              <ul class="list-group">
                <li class="list-group-item">Code: {{ $school->code }}</li>
                <li class="list-group-item">Website: <a href="">{{ $school->website }}</a></li>
                <li class="list-group-item">Email: {{ $school->email }}</li>
                <li class="list-group-item">Phone: {{ $school->phone }}</li>
                <li class="list-group-item">Area (thana): {{ $school->area->thana }}</li>
              </ul>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="panel panel-default" style="margin-top: 30px;">
                <div id='schoolChartContainer' data-class-data='{{ $classData }}' data-classes={{ $classes }}
                      data-attendences={{ $attendences }} class="panel-body">
                    <canvas id="schoolChart"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script type="text/javascript">

        const classData = $('#schoolChartContainer').data('classData');
        const classes = $('#schoolChartContainer').data('classes');
        const attendences = $('#schoolChartContainer').data('attendences');

        console.log(attendences);

        var ctx = document.getElementById("schoolChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: classes,
                datasets: [
                {
                    label: 'Total Students',
                    data: classData,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                },
                {
                    label: 'attendences',
                    data: attendences,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
@endsection