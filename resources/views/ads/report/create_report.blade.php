<!DOCTYPE html>
<html>
<head>
    <title> Report </title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('styles.link')
</head>

<body>
<div class="container">

    <h1 style="text-align: center; margin-top:30px;">Report</h1>

    <a href="{{url('/')}}" class="btn btn-primary a-btn-slide-text">
        <span class="glyphicon glyphicon" aria-hidden="true"></span>
        <span><strong>Home</strong></span>
    </a>
    <a href="{{route('report.index')}}" class="btn btn-primary a-btn-slide-text">
        <span class="glyphicon glyphicon" aria-hidden="true"></span>
        <span><strong>Back</strong></span>
    </a>
    <hr>

    <div class="jumbotron">
        <div class="x_content">
            {{Form::open(['url'=>'/report/generate','method'=> 'GET', 'id'=>'demo-form2', 'class'=>'form-horizontal form-label-left', 'data-parsley-validate'])}}

            <div class="form-group">
                <div class="">
                    Date:

                    {{ Form::date('start', null, ['class' => 'date_from has-feedback-left' , 'aria-describedby'=>'inputSuccess2Status4',
                    'data'=> '' , 'placeholder'=>'From' ]) }}

                    {{ Form::date('end', null, ['class' => 'date_to date-only has-feedback-left' , 'aria-describedby'=>'inputSuccess2Status4',
                    'data'=>'', 'placeholder'=>'To' ]) }}
                    &nbsp; &nbsp;
                    <button type="submit"  class="btn btn-primary btn-xs">generate report</button>
                    <a href="{{action('ReportController@today_report') }}" class="btn btn-success btn-xs">Today</a>
                    <a href="{{action('ReportController@last_thirty_report') }}" class="btn btn-success btn-xs">last 30 days</a>
                    <a href="{{action('ReportController@last_seven_report')}}" class="btn btn-success btn-xs">last 7 days</a>
                </div>
            </div>
            {{Form::close()}}
            @if(isset($sum))
            <table class="table">
                <thead>
                <tr>
                    <th>Total number of order</th>
                    <th>Total budget</th>
                </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>{{$sum['order']}}</td>
                        <td>{{$sum['budget']}}</td>
                    </tr>

                </tbody>
            </table>
            @endif

        </div>
    </div>
</div>
</body>
</html>