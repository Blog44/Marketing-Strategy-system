<!DOCTYPE html>
<html>
<head>
    <title>Edit Details </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('styles.link')
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
    <h1 style="text-align: center;margin-top:30px;">Description of Advertisement</h1>
    <hr>
    <div class="jumbotron">
        <form  method="POST" action="{{route('ads.update', $ad->id)}}" >
            <div class="row">
                @csrf
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="product_name">Product Name:</label>
                        <input type="text" name="product_name" id="product_name" class="form-control" value="{{$product->product_name}}" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="budget">Budget:</label>
                        <input type="text" name="budget" id="budget" class="form-control" value="{{$ad->budget}}" required>
                    </div>
                    <br>
                <!--<div class="form-group">
                        <label for="formField05">Advertisement date</label>
                        {{ Form::text('date_of_delivery', null, ['class' => 'date form-control has-feedback-left' , 'aria-describedby'=>'inputSuccess2Status4','id'=>'datepick-all','placeholder' => 'Click here for date']) }}
                        </div>
                        <br> -->
                    <div class="form-group">
                        <label for="duration">Duration:</label>
                        <input type="text" name="duration" id="duration" class="form-control" value="{{$ad->duration}}" required>
                    </div>
                    <div class="form-group">
                        <label for="no_of_order">Number of order:</label>
                        <input type="text" name="no_of_order" id="no_of_order" class="form-control" value="{{$product->no_of_order}}" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="button button1" value="Update" required>
                    </div>
                </div><!-- end of ad description -->
                <br>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Gender:</label>
                        <div class="form-control">
                            <label>Male
                                <input type="radio" checked="checked" name="gender" value="male">
                                <span class="checkmark"></span>
                            </label>&nbsp;&nbsp;
                            <label>Female
                                <input type="radio" name="gender" value="female" >
                                <span class="checkmark"></span>
                            </label>&nbsp;&nbsp;
                            <label>All
                                <input type="radio" name="gender" value="all" >
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                        <br>
                        <div class="form-group">
                            <label for="age">Age:</label>
                            <input type="text" name="age" id="age" class="form-control" value="{{$target->age}}" required>
                        </div>
                        <div class="form-group">
                            <label for="interest_name">Interest Name</label>
                            <input type="text" name="interest_name" id="interest_name" class="form-control" value="{{$interest->interest_name}}" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Target Location:</label>
                            <select name="location_name" id="location_name" class="form-control">
                                @foreach($locations as $location)
                                    <option {!! ($location->location_name==$location_name->location_name)?'selected':'' !!} value="{{$location->location_name}}">{{$location->location_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><!--end of user description -->
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



