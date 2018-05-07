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
            {{Form::open(['url'=>'/report/generate','method'=> 'GET', 'id'=>'demo-form2', 'class'=>'create_report form-horizontal form-label-left', 'data-parsley-validate'])}}

            <div class="form-group">
                <div>
                    &nbsp;&nbsp;Date:
                    {{ Form::date('start', null, ['class' => 'date_from has-feedback-left' , 'aria-describedby'=>'inputSuccess2Status4',
                    'data'=> '' , 'placeholder'=>'From' ]) }}
                    {{ Form::date('end', null, ['class' => 'date_to date-only has-feedback-left' , 'aria-describedby'=>'inputSuccess2Status4',
                    'data'=>'', 'placeholder'=>'To' ]) }}&nbsp;

                    <div class="col-sm-4">
                        <div class="form-group">
                            <select class="form-control product"  name="product_id" id="product_id"></select>
                        </div>
                    </div>&nbsp; &nbsp;

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
                        @if(isset($product))<th>product type</th>@endif
                        <th>Total number of order</th>
                        <th>Total budget</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @if(isset($product))<td>@foreach($product as $p){{$p->product_name}}@endforeach</td> @endif
                        <td>{{$sum['order']}}</td>
                        <td>{{$sum['budget']}}</td>
                    </tr>
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{asset('js/get_product_report.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js')}}"></script>
</body>
</html>