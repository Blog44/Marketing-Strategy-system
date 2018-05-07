<!DOCTYPE html>

<html>

<head>

    <title> Advertisement </title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('styles.link')

</head>

<body>
<div class="container">

    <h1 style="text-align: center; margin-top:30px;">Index</h1>

    <a href="{{url('/')}}" class="btn btn-primary a-btn-slide-text">
        <span class="glyphicon glyphicon" aria-hidden="true"></span>
        <span><strong>Home</strong></span>
    </a>
    <a href="{{url('/report')}}" class="btn btn-primary a-btn-slide-text">
        <span class="glyphicon glyphicon" aria-hidden="true"></span>
        <span><strong>Report</strong></span>
    </a>
    <hr>

    <div class="jumbotron">
        <div class="x_content">
            {{Form::open(['route'=>['search'],'method'=> 'GET', 'id'=>'demo-form2', 'class'=>'form-horizontal form-label-left', 'data-parsley-validate'])}}

            <div class="form-group">
                <div class="">
                    Date:

                    {{ Form::date('start', null, ['class' => 'date_from has-feedback-left' , 'aria-describedby'=>'inputSuccess2Status4','data'=> '' , 'placeholder'=>'From' ]) }}

                    {{ Form::date('end', null, ['class' => 'date_to date-only has-feedback-left' , 'aria-describedby'=>'inputSuccess2Status4','data'=>'', 'placeholder'=>'To' ]) }}

                    <!--<input type='checkbox' class="date_all">All Reports-->
                    &nbsp; &nbsp;
                    <button type="submit"  class="btn btn-primary btn-xs">Search</button>&nbsp;&nbsp;

                    <a href="{{route('report.index')}}" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon" aria-hidden="true"></span>
                        <span><strong>Show all</strong></span>
                    </a>&nbsp;
                    <a href="{{action('ReportController@today') }}" class="btn btn-success btn-xs">
                    <span class="glyphicon glyphicon" aria-hidden="true"></span> <span><strong>Today</strong></span>
                    </a>&nbsp;
                    <a href="{{action('ReportController@last_thirty') }}" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon" aria-hidden="true"></span>
                        <span><strong>Last thirty</strong></span>
                    </a>&nbsp;
                    <a href="{{action('ReportController@last_seven')}}" class="btn btn-success btn-xs">
                        <span class="glyphicon glyphicon" aria-hidden="true"></span>
                        <span><strong>Last seven</strong></span>
                    </a>

                </div>
            </div>
            <br>
            {{Form::close()}}

            <table class="table">
                <thead>
                <tr>
                    <th>SN</th>
                    <th>Product type</th>
                    <th>Interest field</th>
                    <th>Location</th>
                    <th>Budget</th>
                    <th>Duration</th>
                    <th>Min-Age</th>
                    <th>Max-Age</th>
                    <th>Gender</th>
                </tr>
                </thead>

                @if(isset($result))
                <tbody>
                    @foreach($result as $res)
                    <tr>
                        <td>{{$res->id}}</td>
                        <td>{{$res->product_name}}</td>
                        <td>@foreach($interests[$res->id] as $i)
                                {{$i->interest_name}},
                            @endforeach
                        </td>
                        <td>{{$res->location_name}}</td>
                        <td>{{$res->budget}}</td>
                        <td>{{$res->duration}}</td>
                        <td>{{$res->min_age}}</td>
                        <td>{{$res->max_age}}</td>
                        <td>{{$res->gender}}</td>
                    </tr>
                    @endforeach
                </tbody>
                    @endif
            </table>

        </div>

    </div>

    </div>

    <script src="{{asset('js/get_interest.js')}}"></script>
</body>
</html>

