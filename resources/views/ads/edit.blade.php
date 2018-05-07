<!DOCTYPE html>
<html>
<head>
    <title>Edit Details </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('styles.link')

</head>
<body>
<div class="container">
    <h1 style="text-align: center;margin-top:30px;">Description of Advertisement</h1>
    <hr>
    <a href="{{route('ads.index')}}" class="btn btn-primary a-btn-slide-text">
        <span class="glyphicon glyphicon" aria-hidden="true"></span>
        <span><strong>Back</strong></span>
    </a>
    <div class="jumbotron">
        <form  method="POST" action="{{route('ads.update', $ad->id)}}" >
            <div class="row">
                @csrf
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Product Type:</label>
                        <select name="product_name" id="product_name" class="form-control">
                            @foreach($product as $pro)
                                <option {!! ($pro->product_name==$product_name->product_name)?'selected':'' !!}
                                        value="{{$pro->product_name}}">{{$pro->product_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Interest </label>
                        <select type="text" class="form-control interest" name="interest_id[]" multiple required>
                            @foreach($interest as $key => $val)
                                <option value="{{$key}}" selected>{{$val}}</option>
                            @endforeach
                        </select>

                    </div><br>
                    <div class="form-group">
                        <label for="budget">Budget:</label>
                        <input type="text" name="budget" id="budget" class="form-control" value="{{$ad->budget}}" required>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="duration">Duration:</label>
                        <input type="text" name="duration" id="duration" class="form-control" value="{{$ad->duration}}" required>
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
                            <label for="min_age">Min Age:</label>
                            <input type="text" name="min_age" id="min_age" class="form-control" value="{{$target->min_age}}" required>
                        </div>
                        <div class="form-group">
                            <label for="max_age">Max Age:</label>
                            <input type="text" name="max_age" id="max_age" class="form-control" value="{{$target->max_age}}" required>
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
<script src="{{asset('js/get_interest.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js')}}"></script>

</body>



