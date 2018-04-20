<!DOCTYPE html>
<html>
<head>
    <title>Marketing Details </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{asset('css/bootstrap-datetimepicker.css')}}" rel="stylesheet">

    <style>
        .button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
        .button1 {padding: 10px 24px;}
    </style>
</head>

<body>
<div class="container">
    <div class="jumbotron">
    {!! Form::model([$interests,$locations],['url' => '/ads']) !!}

    <div class="row">
        @csrf
        <h1>Description of Advertisement</h1>
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('no_of_order', 'Number of Order:') !!}
                {!!Form::text('no_of_order',null,['placeholder'=> 'Enter the number of product order', 'class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('product_name', 'Product Type:') !!}
                {!! Form::select('duration',[
                    'cake' => 'cake',
                    'earring' => 'earring',
                    'necklace'=>'necklace',
                    'mug'=>'mug',
                ],null,['class'=>'form-control'])!!}
            </div><br>

            <div class="form-group">
                {!! Form::label('budget', 'Budget') !!}
                {!!Form::text('budget', null,['placeholder'=> 'Enter budget', 'class'=>'form-control']) !!}
            </div><br>

            <div class="form-group">
                {!! Form::label('duration', 'Duration') !!}
                {!!Form::text('duration', null,['placeholder'=> 'Enter duration', 'class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Submit',['class'=>'btn btn primary']) !!}
            </div>
        </div><!-- end of ad description -->
        <br>
        <div class="col-sm-3">
            {!! Form::label('gender', 'Gender') !!}
            <div class="form-group">
                {!! Form::label('male','Male') !!}
                {!! Form::radio('male', 'Male', true) !!}
                {!! Form::radio('female', 'Female', true) !!}
                {!! Form::radio('all', 'All', true) !!}
            </div>
            <br>
            <div class="form-group">
                {!! Form::label('interest_name', 'Interest') !!}
                {!! Form::select('id',$interests , null,[ 'class'=>'form-control'])!!}
            </div><br><!-- Examplecontroller@create $interests = Interest::pluck('interest_name','id'); return view-->

            <div class="form-group">
                {!! Form::label('location_name', 'Location') !!}
                {!! Form::select('id',['id'=>'location_name'],null,[ 'class'=>'form-control'])!!}
            </div><br>

            <div class="form-group">
                {!!  Form::date('name', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
            </div>
        </div>
    </div>

    {!! Form::close() !!}
    @include('errors.error')
    </div>
</div><!--end of  Container -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="{{asset('js/bootstrap-datetimepicker.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
</body>

</html>