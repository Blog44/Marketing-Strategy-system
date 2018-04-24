<!DOCTYPE html>

<html>

<head>

    <title> Details </title>


    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link href="{{asset('css/bootstrap-datetimepicker.css')}}" rel="stylesheet">

    <link href="{{asset('css/custom.css')}}" rel="stylesheet">

</head>

<body>

<div class="container">

    <h1 style="text-align: center;margin-top:30px;">Edit Location</h1>
    <hr>
    <a href="{{route('location.index')}}" class="btn btn-primary a-btn-slide-text">
        <span class="glyphicon glyphicon" aria-hidden="true"></span>
        <span><strong>Back</strong></span>
    </a>
    <div class="jumbotron">
        <form  method="POST" action="{{route('location.update', $loc->id)}}" >
            <div class="row">
                @csrf
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="location_name"> Location Name:</label>
                        <input type="text" name="location_name" id="location_name" class="form-control" value="{{$loc->location_name}}" required>
                    </div>

                    <br>

                    <div class="form-group">

                        <input type="submit" class="button button1" value="Update" required>

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