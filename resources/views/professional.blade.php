@extends('master')

@section('professional')

    <div class="main">

        <section class="module">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="font-alt">Register To be Professional</h4>
                        <hr class="divider-w mb-10">
                        <form action="{{url('professionalregister')}}/{{session()->get('user.u_id')}}" class="form" method="post">
                            @csrf
                            <div class="form-group">
                                <lable><b>Enter Name</b></lable><input class="form-control" type="text" name="pname" placeholder="Your Name"/>
                                {{--@error('name') <span style="color:red;"> {{$message}} </span> @enderror--}}
                            </div>
                            <div class="form-group">
                                <lable><b>Enter Shop Name</b></lable><input class="form-control" type="text" name="shopname" placeholder="Your Shop/Business Name"/>
                                @error('shopname') <span style="color:red;"> {{$message}} </span> @enderror
                            </div>
                            <div class="form-group">
                                <lable><b>Enter GST Number</b></lable><input class="form-control" type="text" name="gst" placeholder="Your Shop/Business' GST Number "/>
                                @error('gst') <span style="color:red;"> {{$message}} </span> @enderror
                            </div>
                            <div class="form-group">
                                <lable><b>Enter Country</b></lable>
                                <select class="form-control" id="cnt" name="country">
                                    <option>--Select Country--</option>
                                    @foreach($cnt as $val)
                                        <option value="{{$val->id}}">{{$val->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <lable><b>Enter State</b></lable>
                                <select class="form-control" id="state" name="state">
                                    <option>--Select State--</option>
                                    {{--<option >Select State</option>--}}
                                </select>
                            </div>
                            <div class="form-group">
                                <lable><b>Enter City</b></lable>
                                <select class="form-control" id="city" name="city">
                                    <option>--Select City--</option>
                                    {{--<option>Select City</option>--}}
                                </select>
                                @error('city') <span style="color:red;"> {{$message}} </span> @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-round btn-b">Register As Professional</button>
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
//            alert(s);
                    $.ajax({
                        url:"{{url('/citydata')}}/"+s,
                        success:function(citydata){
                            $('#city').html(citydata);
                        }
                    });
                });
            </script>

@endsection