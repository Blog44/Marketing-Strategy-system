<!DOCTYPE html>

<html>
<head>
    <title>Marketing Details </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('styles.link')
</head>
<body>
<div class="container">
    <h1 style="text-align: center;margin-top:30px;">Description of Advertisement</h1>
    <hr>
    <div class="jumbotron">
        <form  method="POST" action="{{route('ads.store')}}" >

            <a href="{{url('/')}}" class="btn btn-primary a-btn-slide-text">
                <span class="glyphicon glyphicon" aria-hidden="true"></span>
                <span><strong>Home</strong></span>
            </a>
            <a href="{{route('ads.index')}}" class="btn btn-primary a-btn-slide-text">
                <span class="glyphicon glyphicon" aria-hidden="true"></span>
                <span><strong>Back</strong></span>
            </a>
            <a href="{{action('AdController@index')}}" class="btn btn-primary a-btn-slide-text">
                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                <span><strong>View List</strong></span>
            </a>
            <br>
            <br>
            <div class="row">
                @csrf
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Product Name:</label>
                        <!--<input type="text" name="product_name" id="product_name" class="form-control" value="product_name"  required>-->
                        <select name="product_id" id="product_id" class="form-control" required>
                            @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->product_name}}</option>
                            @endforeach
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label>Location</label>
                        <select name="location_id" id="location_id" class="form-control" required>
                            @foreach($locations as $location)
                                <option value="{{$location->id}}">{{$location->location_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="budget"> Marketing Budget:</label>
                        <input type="text" name="budget" id="budget" class="form-control" required>
                    </div><br>

                    <div class="form-group">
                        <label for="duration">Duration:</label>
                        <input type="text" name="duration" id="duration" class="form-control"  required>
                    </div>
                   <!-- <div class="form-group">
                        <label for="date">Date:</label>
                        {!!  Form::date('name', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
                    </div>-->
                    <div class="form-group">
                        <input type="submit" class="button button1" value="Create" required>
                    </div>
                </div><!-- end of ad description -->
                <br>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Gender:</label>
                        <div class="form-control">
                            <label>Male
                                <input type="radio" checked="checked" name="gender" value="male" required>
                                <span class="checkmark"></span>
                            </label>&nbsp;&nbsp;
                            <label>Female
                                <input type="radio" name="gender" value="female" required>
                                <span class="checkmark"></span>
                            </label>&nbsp;&nbsp;

                            <label>All
                                <input type="radio" name="gender" value="all" required>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <label>Interest</label>

                        <select class="form-control interest" name="interest_id[]" id="interest_id" multiple=""></select>

                    </div><br>
                    <div class="form-group">
                        <label for="min_age">Min Age:</label>
                        <input type="text" name="min_age" id="min_age" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="maxage">Max Age:</label>
                        <input type="text" name="max_age" id="max_age" class="form-control" required>
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

</html></html>