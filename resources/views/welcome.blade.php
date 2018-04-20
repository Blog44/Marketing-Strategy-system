<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>

        <title></title>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        @include('styles.link')

    </head>
    <body>

    <div class="container">

    <h1 style="text-align: center;margin-top:30px;">Click below</h1>
        <div class="jumbotron">

            <a href="{{action('AdController@index')}}" class="btn btn-primary a-btn-slide-text">
                <span class="glyphicon glyphicon" aria-hidden="true"></span>
                <span><strong>Advertisement</strong></span>
            </a>
            <br>

            <a href="{{action('InterestController@index')}}" class="btn btn-primary a-btn-slide-text">
                <span class="glyphicon glyphicon" aria-hidden="true"></span>
                <span><strong>Interest details</strong></span>
            </a><br>

            <a href="{{action('LocationController@index')}}" class="btn btn-primary a-btn-slide-text">
                <span class="glyphicon glyphicon" aria-hidden="true"></span>
                <span><strong>Location details</strong></span>
            </a><br>

            <a href="{{action('ProductController@index')}}" class="btn btn-primary a-btn-slide-text">
                <span class="glyphicon glyphicon" aria-hidden="true"></span>
                <span><strong>Product details</strong></span>
            </a><br>


        </div>

    </div>
    </body>
</html>
