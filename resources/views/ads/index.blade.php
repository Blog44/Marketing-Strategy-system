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

    <h1 style="text-align: center; margin-top:30px;">Advertisement Details</h1>

    <a href="{{action('AdController@create')}}" class="btn btn-primary a-btn-slide-text">
        <span class="glyphicon glyphicon-create" aria-hidden="true"></span>
        <span><strong>Create</strong></span>
    </a>
    <a href="{{url('/')}}" class="btn btn-primary a-btn-slide-text">
        <span class="glyphicon glyphicon" aria-hidden="true"></span>
        <span><strong>Home</strong></span>
    </a>

    <hr>

    <div class="jumbotron">

        <table class="table">
            <thead>
            <tr>
                <th>SN</th>
                <th>Product type</th>
                <th>Interest field</th>
                <th>Location</th>
                <th>Budget</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
            @foreach($result as $ad)
                <tr>

                    <td>{{$ad->id}}</td>
                    <td>{{$ad->product_name}}</td>
                    <td>{{$ad->interest_name}}</td>
                    <td>{{$ad->location_name}}</td>
                    <td>{{$ad->budget}}</td>

                    <td>
                        <a href="{{action('AdController@show', $ad->id)}}" class="btn btn-primary a-btn-slide-text">
                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                            <span><strong>View</strong></span>
                        </a>
                    </td>
                    <td>
                        <a href="{{action('AdController@edit', $ad->id)}}" class="btn btn-primary a-btn-slide-text">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            <span><strong>Edit</strong></span>
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="{{route('ads.destroy', $ad->id)}} ">
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

