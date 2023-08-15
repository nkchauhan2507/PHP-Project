@extends('master')

@section('register')

    <div class="main">

        <section class="module">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="font-alt">Register</h4>
                        <hr class="divider-w mb-10">
                        <form action="{{url('signup')}}" class="form" method="post">
                            @csrf
                            <div class="form-group">
                                <lable><b>Enter Name</b></lable><input class="form-control" type="text" name="cname" placeholder="Your Name"/>
                                @error('name') <span style="color:red;"> {{$message}} </span> @enderror
                            </div>

                            <div class="form-group">
                                <lable><b>Enter Email</b></lable><input class="form-control" type="text" name="email" placeholder="Email"/>
                                @error('email') <span style="color:red;"> {{$message}} </span> @enderror
                            </div>
                            <div class="form-group">
                                <lable><b>Enter Country</b></lable>
                                <select class="form-control" id="cnt" name="country">
                                    <option>--Select--</option>
                                    @foreach($cnt as $val)
                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                    @endforeach
                                </select>
                                @error('country') <span style="color:red;"> {{$message}} </span> @enderror
                            </div>
                            <div class="form-group">
                                    <lable><b>Enter State</b></lable>
                                    <select class="form-control" id="state" name="state">
                                        <option>--Select--</option>
                                        {{--<option >Select State</option>--}}
                                    </select>
                                @error('state') <span style="color:red;"> {{$message}} </span> @enderror
                            </div>
                            <div class="form-group">
                                <lable><b>Enter City</b></lable>
                                <select class="form-control" id="city" name="city">
                                    <option>--Select--</option>
                                    {{--<option>Select City</option>--}}
                                </select>
                                @error('city') <span style="color:red;"> {{$message}} </span> @enderror
                            </div>
                            <div class="form-group">
                                <lable><b>Enter Address</b></lable><textarea class="form-control" type="text" name="address" placeholder="Detailed Address" /></textarea>
                                @error('address') <span style="color:red;"> {{$message}} </span> @enderror
                            </div>
                            <div class="form-group">
                                <lable><b>Enter Pincode</b></lable><input class="form-control" type="text" name="pincode" placeholder="Pincode" />
                                @error('pincode') <span style="color:red;"> {{$message}} </span> @enderror
                            </div>
                            <div class="form-group">
                                <lable><b>Enter phoneno</b></lable><input class="form-control" type="text" name="phoneno" placeholder="Phone No" />
                                @error('phoneno') <span style="color:red;"> {{$message}} </span> @enderror
                            </div>
                            <div class="form-group">
                                {{--<input type="text"/>--}}
                                <lable><b>Enter Gender</b></lable>
                                <select class="form-control" name="gender">
                                    <option>--Select--</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                                @error('gender') <span style="color:red;"> {{$message}} </span> @enderror
                            </div>
                            <div class="form-group">
                                <lable><b>Enter DOB</b></lable><input class="form-control" type="date" name="DOB" placeholder="DOB"/>
                                @error('DOB') <span style="color:red;"> {{$message}} </span> @enderror
                            </div>
                            <div class="form-group">
                                <lable><b>Enter Password</b></lable> <input class="form-control" type="password" name="password" placeholder="Password"/>
                                @error('password') <span style="color:red;"> {{$message}} </span> @enderror
                            </div>
                            {{--<div class="form-group">--}}
                                {{--<input class="form-control" id="type" type="text" name="type" placeholder="User Type"/>--}}
                                {{--<lable><b>Enter User Type</b></lable>--}}
                                {{--<select class="form-control" name="utype">--}}
                                    {{--<option>--Select--</option>--}}
                                    {{--<option value="0">Admin</option>--}}
                                    {{--<option value="1">User</option>--}}
                                {{--</select>--}}
                                {{--@error('utype') <span style="color:red;"> {{$message}} </span> @enderror--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<lable><b>Enter Designation</b></lable><input class="form-control" id="designation" type="text" name="designation" placeholder="Enter Designation"/>--}}
                                {{--@error('cpassword') <span style="color:red;"> {{$message}} </span> @enderror--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-circle "> <span class="fa fa-paper-plane-o">   Register  </span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection
@section('script')
            <script src="{{asset('assets')}}/js/plugins.js"></script>
            <script src="{{asset('assets')}}/js/main.js"></script>
            <script src="{{asset('assets')}}/lib/jquery/dist/jquery.js"></script>
    <script>
        $('#cnt').change(function(){
            var c=$(this).val();
                //alert(c);
            $.ajax({
               url:"{{url('/countrydata')}}/"+c,
                success:function(result){
                        console.log(result);
                        $('#state').html(result);
                }
            });
        });

        $('#state').change(function(){
            var s=$(this).val();
            $.ajax({
                url:"{{url('/citydata')}}/"+s,
                success:function(citydata){
                        $('#city').html(citydata);
                }
            });
        });
    </script>

@endsection