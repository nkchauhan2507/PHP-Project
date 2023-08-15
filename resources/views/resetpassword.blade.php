@extends('master')

@section('forgotpass')
    <div class="main">

        <section class="module">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 col-sm-offset-1 mb-sm-40">
                        <h4 class="font-alt">Reset Password</h4>
                        <hr class="divider-w mb-10">
                        <form class="form" action="{{url('reset')}}" method="post">
                            @csrf
                            <div class="form-group">
                                {{--<input class="form-control" id="email" type="text" name="email" placeholder="Enter Registered Email"/>--}}
                                <input type="hidden" name="token" class="form-control" value="{{$token}}" placeholder="Enter New Password">
                                <input type="password" name="password" class="form-control" placeholder="Enter New Password"><br>
                                <input type="password" name="cpassword" class="form-control" placeholder="Re-type New Password">
                                <span style="color:Red;">{{session()->get('msg')}}</span>
                                {{--@error('email') <span style="color:red;"> {{$message}} </span> @enderror--}}
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-round btn-b">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection