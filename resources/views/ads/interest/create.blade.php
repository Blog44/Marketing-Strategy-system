<!DOCTYPE html>
<html>
<head>
    <title>Marketing Details </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{asset('css/bootstrap-datetimepicker.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 style="text-align: center;margin-top:30px;"> Create Interest</h1>
    <a href="{{action('InterestController@index')}}" class="btn btn-primary a-btn-slide-text">
        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
        <span><strong>View</strong></span>
    </a>
    <a href="{{url('/')}}" class="btn btn-primary a-btn-slide-text">
        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
        <span><strong>Home</strong></span>
    </a>
    <a href="{{route('interest.index')}}" class="btn btn-primary a-btn-slide-text">
        <span class="glyphicon glyphicon" aria-hidden="true"></span>
        <span><strong>Back</strong></span>
    </a>
    <hr>
    <div class="jumbotron">
        <form  method="POST" action="{{route('interest.store')}}" >
            <div class="row">
                @csrf
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="interest_name">Interest</label>
                        <input type="text" name="interest_name" id="interest_name" class="form-control" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="submit" class="button button1" value="Create" required>
                    </div>
                </div><!-- end of ad description -->
            </div>
    </form>
</div>
@include('errors.error')
</div><!--end of  Container -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="{{asset('js/bootstrap-datetimepicker.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
</body>

</html></html>