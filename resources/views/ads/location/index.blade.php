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

    <h1 style="text-align: center; margin-top:30px;">Location Details</h1>

    <a href="{{action('LocationController@create')}}" class="btn btn-primary a-btn-slide-text">
        <span class="glyphicon glyphicon-create" aria-hidden="true"></span>
        <span><strong>Create</strong></span>
    </a>
    <a href="{{url('/')}}" class="btn btn-primary a-btn-slide-text">
        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
        <span><strong>Home</strong></span>
    </a>

    <hr>

    <div class="jumbotron">

        <table class="table">
            <thead>
            <tr>
                <th>SN</th>
                <th>Location</th>
                <th>Actions</th>

            </tr>
            </thead>

            <tbody>
            @foreach($location as $loc)
                <tr>
                    <td>{{$loc->id}}</td>
                    <td>{{$loc->location_name}}</td>
                    <td>
                        <a href="{{action('LocationController@edit', $loc->id)}}" class="btn btn-primary a-btn-slide-text">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            <span><strong>Edit</strong></span>
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="{{route('location.destroy', $loc->id)}} ">
                            {{method_field('DELETE')}}
                            @csrf
                            <button type="submit" class="btn btn-primary a-btn-slide-text">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                <span><strong>Delete</strong></span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>
</div>
</body>
</html>

