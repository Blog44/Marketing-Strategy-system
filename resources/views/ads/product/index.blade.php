<!DOCTYPE html>

<html>

<head>

    <title> location </title>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link href="{{asset('css/bootstrap-datetimepicker.css')}}" rel="stylesheet">

    <link href="{{asset('css/custom.css')}}" rel="stylesheet">

</head>

<body>

<div class="container">

    <h1 style="text-align: center;margin-top:30px;">Details</h1>

    <a href="{{action('ProductController@create')}}" class="btn btn-primary a-btn-slide-text">
        <span class="glyphicon glyphicon-create" aria-hidden="true"></span>
        <span><strong>Create</strong></span>
    </a>


    <hr>

    <div class="jumbotron">

        <table class="table">
            <thead>
            <tr>
                <th>SN</th>
                <th>Products</th>
                <th>Number of order</th>
            </tr>
            </thead>
            <tbody>
            @foreach($product as $pro)
                <tr>
                    <td>{{$pro->id}}</td>
                    <td>{{$pro->product_name}}</td>
                    <td>{{$pro->no_of_order}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>

