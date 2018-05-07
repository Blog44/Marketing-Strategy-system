<!DOCTYPE html>

<html>

<head>
    <title> View Details </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{asset('css/bootstrap-datetimepicker.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
</head>

<body>
<div class="container">
        <div class="form-group">
            <h1 style="text-align: center;"> Marketing Details </h1>

            <hr>
            <a href="{{route('ads.index')}}" class="btn btn-primary a-btn-slide-text">
                <span class="glyphicon glyphicon" aria-hidden="true"></span>
                <span><strong>Back</strong></span>
            </a>
            <div class="jumbotron">

                @foreach($results as $ad)
                    <label>Location:&nbsp</label>{{$ad->location_name}}<br>
                    <label>Product Name:&nbsp</label>{{$ad->product_name}}<br>
                    <label>Number of order:&nbsp</label>{{$ad->no_of_order}}<br>
                    <label>Interest:&nbsp</label>
                    @foreach($interests[$ad->id] as $i)
                            {{$i->interest_name}},
                        @endforeach<br>
                    <label>Min-Age:&nbsp</label>{{$ad->min_age}}<br>
                    <label>Max-Age:&nbsp</label>{{$ad->max_age}}<br>
                    <label>Gender:&nbsp</label>{{$ad->gender}}<br>
                    <label>Budget:&nbsp</label>{{$ad->budget}}<br>
                    <label>Duration:&nbsp</label>{{$ad->duration}}<br>
                @endforeach

            </div>
        </div>


</div>
</body>
</html>

